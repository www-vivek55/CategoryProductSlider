<?php

namespace RvsMedia\CategoryProductSlider\ViewModel;

use Magento\Catalog\Helper\Image;
use Magento\Catalog\Model\Product\Gallery\ReadHandler as GalleryReadHandler;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class ProductGalleryReadHandler implements ArgumentInterface
{
    /**
     * @var GalleryReadHandler
     */
    protected $galleryReadHand;

    /**
     * @var Image
     */
    private $productImageHelper;

    /**
     * ProductGalleryReadHandler constructor.
     *
     * @param GalleryReadHandler $galleryReadHandler
     * @param Image $productImageHelper
     */
    public function __construct(
        GalleryReadHandler $galleryReadHandler,
        Image $productImageHelper
    ) {
        $this->galleryReadHandler = $galleryReadHandler;
        $this->productImageHelper = $productImageHelper;
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

    /**
     * Resizes the product image for the list page.
     *
     * @param mixed $product
     * @param mixed $listImage
     * @param int $width
     * @param int $height
     * @return string
     */
    public function resizeListImage($product, $listImage, $width, $height)
    {
        return $this->productImageHelper->init($product, 'product_page_image_large')
            ->setImageFile($listImage)
            ->resize($width, $height)
            ->getUrl();
    }
}
