<?php

namespace jarvis\core;

class Bundle
{
    private string $title;
    private string $view;
    private BundleCollection $collection;
    private array $data;
    public function __construct(string $title, string $view, BundleCollection $collection = null, array $data = null)
    {
        $this->title = $title;
        $this->view = $view;
        if ($collection != null) {
            $this->collection = $collection;
        } else {
            $this->collection = new BundleCollection();
        }
        if ($data != null) {
            $this->data = $data;
        } else {
            $this->data = array();
        }
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getView()
    {
        return $this->view;
    }
    public function getCollection(): BundleCollection
    {
        return $this->collection;
    }
    public function getData(): array
    {
        return $this->data;
    }
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function setView(string $view)
    {
        $this->view = $view;
    }
    public function setCollection(BundleCollection $collection)
    {
        $this->collection = $collection;
    }
    public function setData(array $data)
    {
        $this->data = $data;
    }
}
