<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Attributes\On;

class ProductList extends Component
{
    #[Url(as: 'search')]
    public $searchTerm = '';
    
    #[Url(as: 'brand')]
    public $selectedBrand = '';
    
    #[Url(as: 'category')]
    public $selectedCategory = '';
    
    #[Url(as: 'price')]
    public $selectedPrice = '';
    
    public $perPage = 10;
    public $hasMorePages = true;

    #[On('filter-brand')]
    public function filterBrand($brand)
    {
        $this->selectedBrand = $brand;
        $this->perPage = 10;
    }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function resetFilters()
    {
        $this->searchTerm = '';
        $this->selectedBrand = '';
        $this->selectedCategory = '';
        $this->selectedPrice = '';
        $this->perPage = 10;
    }

    public function updatedSearchTerm()
    {
        $this->perPage = 10;
    }

    public function updatedSelectedBrand()
    {
        $this->perPage = 10;
    }

    public function updatedSelectedCategory()
    {
        $this->perPage = 10;
    }

    public function updatedSelectedPrice()
    {
        $this->perPage = 10;
    }

    public function render()
    {
        $query = Product::where('is_available', true);

        // Only show products that are not expired deals
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
                case '0-500':
                    $query->where('price', '<=', 500);
                    break;
                case '500-1000':
                    $query->whereBetween('price', [500, 1000]);
                    break;
                case '1000-2000':
                    $query->whereBetween('price', [1000, 2000]);
                    break;
                case '2000-5000':
                    $query->whereBetween('price', [2000, 5000]);
                    break;
                case '5000+':
                    $query->where('price', '>=', 5000);
                    break;
            }
        }

        $totalCount = $query->count();
        $products = $query->latest()->take($this->perPage)->get();
        $this->hasMorePages = $totalCount > $this->perPage;

        return view('livewire.product-list', [
            'products' => $products,
            'totalCount' => $totalCount,
            'brands' => Brand::orderBy('name')->get(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }
}
