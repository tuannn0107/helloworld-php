<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{
    protected $model;
    /**
     * Instantiate reporitory
     *
     * @param Post $model
     */
    public function __construct(Post $model)
    {
        $this->model=$model;
    }

    /**
     * Get All
     * @return Post[]
     */
    public function getAll()
    {
        return $this->model->all();
    }


    /**
     * Get list Post by filter
     * @param Post $modelFilter
     * @return Post[]
     */
    public function readPostList(Post $modelFilter)
    {
        // TODO filter condition
        $results[] = $this->model->all();
        return $results;
    }


    /**
     * Get one
     * @param $modelFilter
     * @return Post
     */
    public function read(Post $modelFilter)
    {
        $result = $this->model->findOrFail($modelFilter->id);
        return $result;
    }


    /**
     * Create
     * @param Post $model
     * @return mixed
     * @throws \Throwable
     */
    public function create(Post $model)
    {
        // TODO define the model attributes here
        return $model->save($model);
    }


    /**
     * Update
     * @param Post $model
     * @return bool|mixed
     */
    public function update(Post $model)
    {
        //TODO set the primary key here

        return $model->save($model);
    }


    /**
     * Delete
     *
     * @param $model
     * @return bool
     * @throws \Exception
     */
    public function delete(Post $model)
    {
        return $model->delete();
    }
}
