<?php

namespace app\models;

class Author extends ModelObject
{
    private int $id;
    private string $fio;
    private string $birthday;
    private string $photo;

    public function __construct(array $author)
    {
        $this->id = $author['id'];
        $this->fio = $author['fio'];
        $this->birthday = $author['birthday'];
        $this->photo = $author['photo'];
    }

    /**
     * get_id
     *
     * @return void
     */
    public function get_id()
    {
        return $this->id;
    }
    /**
     * get_fio
     *
     * @return void
     */
    public function get_fio()
    {
        return $this->fio;
    }
    /**
     * get_birthday
     *
     * @return void
     */
    public function get_birthday()
    {
        return $this->birthday;
    }
    /**
     * get_photo
     *
     * @return void
     */
    public function get_photo()
    {
        return $this->photo;
    }

    /**
     * set_id
     *
     * @param  mixed $id
     * @return void
     */
    public function set_id(int $id)
    {
        $this->id = $id;
    }
    /**
     * set_fio
     *
     * @param  mixed $fio
     * @return void
     */
    public function set_fio(string $fio)
    {
        $this->fio = $fio;
    }
    /**
     * set_birthday
     *
     * @param  mixed $birthday
     * @return void
     */
    public function set_birthday(string $birthday)
    {
        $this->birthday = $birthday;
    }
    /**
     * set_photo
     *
     * @param  mixed $photo
     * @return void
     */
    public function set_photo(string $photo)
    {
        $this->photo = $photo;
    }
}
