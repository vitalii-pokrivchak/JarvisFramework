<?php

//* Book @vitalii-pokrivchak
namespace app\models;

//* Class Book extended of ModelObject
class Book extends ModelObject
{
    public string $title;
    public int $author_id;
    public string $poster;
    public int $pages;
    public string $preview_text;
    public int $publishing_house_id;
    public int $published_at;
    public int $language_id;
    public string $uploaded_at;
    public int $book_category_id;
    public bool $illustration;
    public int $book_type_id;
    public float $price;
    /**
     * __construct
     *
     * @param  mixed $book
     * @return void
     */
    public function __construct(array $book)
    {
        $this->title = $book['title'];
        $this->author_id = $book['author_id'];
        $this->poster = $book['poster'];
        $this->pages = $book['pages'];
        $this->preview_text = $book['preview_text'];
        $this->publishing_house_id = $book['publishing_house_id'];
        $this->published_at = $book['published_at'];
        $this->language_id = $book['language_id'];
        $this->book_category_id = $book['book_category_id'];
        $this->illustration = $book['illustration'];
        $this->book_type_id = $book['book_type_id'];
        $this->price = $book['price'];
    }
    /**
     * get_title
     *
     * @return string
     */
    public function get_title(): string
    {
        return $this->title;
    }
    /**
     * get_author_id
     *
     * @return int
     */
    public function get_author_id(): int
    {
        return $this->author_id;
    }
    /**
     * get_poster
     *
     * @return string
     */
    public function get_poster(): string
    {
        return $this->poster;
    }
    /**
     * get_pages
     *
     * @return int
     */
    public function get_pages(): int
    {
        return $this->pages;
    }
    /**
     * get_preview_text
     *
     * @return string
     */
    public function get_preview_text(): string
    {
        return $this->preview_text;
    }
    /**
     * get_publishing_house_id
     *
     * @return int
     */
    public function get_publishing_house_id(): int
    {
        return $this->publishing_house_id;
    }
    /**
     * get_published_at
     *
     * @return int
     */
    public function get_published_at(): int
    {
        return $this->published_at;
    }
    /**
     * get_language_id
     *
     * @return int
     */
    public function get_language_id(): int
    {
        return $this->language_id;
    }
    /**
     * get_uploaded_at
     *
     * @return string
     */
    public function get_uploaded_at(): string
    {
        return $this->uploaded_at;
    }
    /**
     * get_book_category_id
     *
     * @return int
     */
    public function get_book_category_id(): int
    {
        return $this->book_category_id;
    }
    /**
     * get_illustration
     *
     * @return bool
     */
    public function get_illustration(): bool
    {
        return $this->illustration;
    }
    /**
     * get_book_type_id
     *
     * @return int
     */
    public function get_book_type_id(): int
    {
        return $this->book_type_id;
    }
    /**
     * get_price
     *
     * @return float
     */
    public function get_price(): float
    {
        return $this->price;
    }
    /**
     * set_title
     *
     * @param  mixed $title
     * @return void
     */
    public function set_title(string $title)
    {
        $this->title = $title;
    }
    /**
     * set_author_id
     *
     * @param  mixed $author_id
     * @return void
     */
    public function set_author_id(int $author_id)
    {
        $this->author_id = $author_id;
    }
    /**
     * set_poster
     *
     * @param  mixed $poster
     * @return void
     */
    public function set_poster(string $poster)
    {
        $this->poster = $poster;
    }
    /**
     * set_pages
     *
     * @param  mixed $pages
     * @return void
     */
    public function set_pages(int $pages)
    {
        $this->pages = $pages;
    }
    /**
     * set_preview_text
     *
     * @param  mixed $preview_text
     * @return void
     */
    public function set_preview_text(string $preview_text)
    {
        $this->preview_text = $preview_text;
    }
    /**
     * set_publishing_house_id
     *
     * @param  mixed $publishing_house_id
     * @return void
     */
    public function set_publishing_house_id(int $publishing_house_id)
    {
        $this->publishing_house_id = $publishing_house_id;
    }
    /**
     * set_published_at
     *
     * @param  mixed $published_at
     * @return void
     */
    public function set_published_at(int $published_at)
    {
        $this->published_at = $published_at;
    }
    /**
     * set_language_id
     *
     * @param  mixed $language_id
     * @return void
     */
    public function set_language_id(int $language_id)
    {
        $this->language_id = $language_id;
    }
    /**
     * set_book_category_id
     *
     * @param  mixed $book_category_id
     * @return void
     */
    public function set_book_category_id(int $book_category_id)
    {
        $this->book_category_id = $book_category_id;
    }
    /**
     * set_illustration
     *
     * @param  mixed $illustration
     * @return void
     */
    public function set_illustration(bool $illustration)
    {
        $this->illustration = $illustration;
    }
    /**
     * set_uploaded_at
     *
     * @param  string $uploaded_at
     * @return void
     */
    public function set_uploaded_at(string $uploaded_at)
    {
        $this->uploaded_at = $uploaded_at;
    }
    /**
     * set_book_type_id
     *
     * @param  mixed $book_type_id
     * @return void
     */
    public function set_book_type_id(int $book_type_id)
    {
        $this->book_type_id = $book_type_id;
    }
    /**
     * set_price
     *
     * @param  mixed $price
     * @return void
     */
    public function set_price(float $price)
    {
        $this->price = $price;
    }

    public function get_all()
    {
        $allInfo = array(
            'title' => $this->title,
            'author_id' => $this->author_id,
            'poster' => $this->poster,
            'pages' => $this->pages,
            'preview_text' => $this->preview_text,
            'publishing_house_id' => $this->publishing_house_id,
            'published_at' => $this->published_at,
            'language_id' => $this->language_id,
            'book_category_id' => $this->book_category_id,
            'illustration' => $this->illustration,
            'book_type_id' => $this->book_type_id,
            'price' => $this->price,
        );
        return $allInfo;
    }
}
