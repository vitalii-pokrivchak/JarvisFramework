<?php

namespace app\models;

class Author extends ModelObject
{
    private string $fio;
    private int $country_id;
    private string $birthday;
    private string $photo;

    public function __construct(array $author)
    {
        $this->fio = $author['fio'];
        $this->country_id = $author['country_id'];
        $this->birthday = $author['birthday'];
        $this->photo = $author['photo'];
    }

    /**
     * get_id
     *
     * @return void
     */
    
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

    public function get_all()
    {
        $allInfo = array(
            'fio' => $this->fio,
            'birthday' => $this->birthday,
            'country_id' => $this->country_id,
            'photo' => $this->photo,
        );
        return $allInfo;
    }


    public function getName()
    {
        $path = explode('\\', __CLASS__);
        return array_pop($path);
    }
}
