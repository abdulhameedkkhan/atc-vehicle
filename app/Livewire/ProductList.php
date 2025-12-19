<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Url;

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
        $query = Product::where('is_available', true);

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
        ]);
    }
}
