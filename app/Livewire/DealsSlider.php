<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\CarPart;

class DealsSlider extends Component
{
    public $type = 'vehicle'; // 'vehicle' or 'part'
    public $currentIndex = 0;
    
    public function mount($type)
    {
        $this->type = $type;
    }

    public function next()
    {
        $totalItems = $this->type === 'vehicle' ? $this->getVehiclesQuery()->count() : $this->getPartsQuery()->count();
        $totalChunks = ceil($totalItems / 8);
        
        if ($this->currentIndex < $totalChunks - 1) {
            $this->currentIndex++;
        }
    }

    public function previous()
    {
        if ($this->currentIndex > 0) {
            $this->currentIndex--;
        }
    }

    private function getVehiclesQuery()
    {
        $now = now();
        return Product::where('is_available', true)
            ->where('is_deal', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('deal_starts_at')
                  ->orWhere('deal_starts_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('deal_ends_at')
                  ->orWhere('deal_ends_at', '>=', $now);
            });
    }

    private function getPartsQuery()
    {
        $now = now();
        return CarPart::where('is_available', true)
            ->where('is_deal', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('deal_starts_at')
                  ->orWhere('deal_starts_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('deal_ends_at')
                  ->orWhere('deal_ends_at', '>=', $now);
            });
    }

    public function render()
    {
        $items = [];
        $totalItems = 0;

        if ($this->type === 'vehicle') {
            $query = $this->getVehiclesQuery();
            $totalItems = $query->count();
            // Get chunk of 8 items based on currentIndex
            $items = $query->latest()
                           ->skip($this->currentIndex * 8)
                           ->take(8)
                           ->get();
        } else {
            $query = $this->getPartsQuery();
            $totalItems = $query->count();
            $items = $query->latest()
                           ->skip($this->currentIndex * 8)
                           ->take(8)
                           ->get();
        }

        $totalChunks = ceil($totalItems / 8);

        return view('livewire.deals-slider', [
            'items' => $items,
            'totalItems' => $totalItems,
            'totalChunks' => $totalChunks
        ]);
    }
}
