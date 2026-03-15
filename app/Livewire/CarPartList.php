<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use App\Models\CarPart;
use App\Models\PartCategory;
use Livewire\Attributes\Url;

class CarPartList extends Component
{
    #[Url(as: 'search')]
    public $searchTerm = '';
    
    #[Url(as: 'brand')]
    public $selectedBrand = '';
    
    #[Url(as: 'category')]
    public $selectedCategory = '';
    
    #[Url(as: 'price')]
    public $selectedPrice = '';
    
    public $perPage = 8;
    public $hasMorePages = true;

    public function loadMore()
    {
        $this->perPage += 8;
    }

    public function resetFilters()
    {
        $this->searchTerm = '';
        $this->selectedBrand = '';
        $this->selectedCategory = '';
        $this->selectedPrice = '';
        $this->perPage = 8;
    }

    public function updatedSearchTerm()
    {
        $this->perPage = 8;
    }

    public function updatedSelectedBrand()
    {
        $this->perPage = 8;
    }

    public function updatedSelectedCategory()
    {
        $this->perPage = 8;
    }

    public function updatedSelectedPrice()
    {
        $this->perPage = 8;
    }

    public function render()
    {
        $query = CarPart::where('is_available', true);

        // Only show car parts that are not expired deals
        $now = now();
        $query->where(function ($q) use ($now) {
            $q->where('is_deal', false)
              ->orWhere(function ($q2) use ($now) {
                  $q2->where('is_deal', true)
                     ->where(function ($q3) use ($now) {
                         $q3->whereNull('deal_starts_at')
                            ->orWhere('deal_starts_at', '<=', $now);
                     })
                     ->where(function ($q3) use ($now) {
                         $q3->whereNull('deal_ends_at')
                            ->orWhere('deal_ends_at', '>=', $now);
                     });
              });
        });

        // Search filter
        if ($this->searchTerm) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('brand', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('model', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('part_number', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
            });
        }

        // Brand filter
        if ($this->selectedBrand) {
            $query->where('brand', $this->selectedBrand);
        }

        // Category filter
        if ($this->selectedCategory) {
            $query->where('category', $this->selectedCategory);
        }

        // Price filter
        if ($this->selectedPrice) {
            switch ($this->selectedPrice) {
                case '0-100':
                    $query->where('price', '<=', 100);
                    break;
                case '100-500':
                    $query->whereBetween('price', [100, 500]);
                    break;
                case '500-1000':
                    $query->whereBetween('price', [500, 1000]);
                    break;
                case '1000-2000':
                    $query->whereBetween('price', [1000, 2000]);
                    break;
                case '2000+':
                    $query->where('price', '>=', 2000);
                    break;
            }
        }

        $totalCount = $query->count();
        $carParts = $query->latest()->take($this->perPage)->get();
        $this->hasMorePages = $totalCount > $this->perPage;

        return view('livewire.car-part-list', [
            'carParts' => $carParts,
            'totalCount' => $totalCount,
            'brands' => Brand::orderBy('name')->get(),
            'partCategories' => PartCategory::orderBy('name')->get(),
        ]);
    }
}

