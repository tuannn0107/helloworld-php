<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected  $postRepository;
    /**
     * Instantiate reporitory
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository=$postRepository;
    }

    /**
     * Get All
     * @return Post[]
     */
    public function getAll()
    {
        return $this->postRepository->getAll();
    }


    /**
     * Get list Post by filter
     * @param Post $modelFilter
     * @return Post[]
     */
    public function readPostList(Post $modelFilter)
    {
        return $this->postRepository->readPostList($modelFilter);
    }


    /**
     * Get one
     * @param $modelFilter
     * @return Post
     */
    public function read(Post $modelFilter)
    {
        return $this->postRepository->read($modelFilter);
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
        return $this->postRepository->create($model);
    }


    /**
     * Update
     * @param Post $model
     * @return bool|mixed
     */
    public function update(Post $model)
    {
        return $this->postRepository->update($model);
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
        return $this->postRepository->delete($model);
    }
}
