<?php

namespace RvsMedia\CategoryProductSlider\ViewModel;

use Magento\Catalog\Model\Product\Gallery\ReadHandler as GalleryReadHandler;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductGalleryReadHandler implements ArgumentInterface
{
    /**
     * @var GalleryReadHandler
     */
    protected $galleryReadHand;

    /**
     * ProductGalleryReadHandler constructor.
     *
     * @param GalleryReadHandler $galleryReadHandler
     */
    public function __construct(
        GalleryReadHandler $galleryReadHandler
    ) {
        $this->galleryReadHandler = $galleryReadHandler;
    }

    /**
     * Add image gallery to $product
     *
     * @param mixed $product
     * @return mixed
     */
    public function addGallery($product)
    {
        return $this->galleryReadHandler->execute($product);
    }
}
