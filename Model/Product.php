<?php

class Product
{
    private $productId;
    private $productName;
    private $productFileLink;

    // class Product constructor
    function __construct($productName, $productFileLink)
    {
        $this->productName = $productName;
        $this->productFileLink = $productFileLink;
    }

    // Setters and Getters
    function setProductName($name)
    {
        $this->productName = $name;
    }

    function getProductName()
    {
        return $this->productName;
    }

    function setProductFileLink($link)
    {
        $this->productFileLink = $link;
    }

    function getProductFileLink()
    {
        return $this->productFileLink;
    }

    // database connection
    // CRUD

}

