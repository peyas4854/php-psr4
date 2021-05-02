<?php

namespace app\controller;
use app\model\Books;
class BooksController
{

    /**
     * @return bool|\PDOStatement
     */
    public function getBook()
    {
        $books = new Books();
        return $books->getAll();
    }

    /**
     * @return bool
     */
    public function create()
    {

        $books = new Books();
        return $books->create();

    }

    /**
     * @param $id
     * @return array
     */
    public function edit($id)
    {
        $books = new Books();
        return $books->edit($id);
    }

    /**
     * @param $postData
     * @return bool
     */
    public function update($postData)
    {
        $books = new Books();
        return $books->update($postData);
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $books = new Books();
        return $books->delete($id);
    }
}
