<?php
namespace App\Transformers;
use App\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class postTransformer{

    public function withPagination(LengthAwarePaginator $posts)
    {
        $payload = [
            'total' => $posts->total(),
            'per_page' => $posts->perPage(),
            'current_page' => $posts->currentPage(),
            'last_page' => $posts->lastPage(),
            'next_page_url' => $posts->nextPageUrl(),
            'prev_page_url' => $posts->previousPageUrl(),
            //array_map (callback, 'post')
            'data' => array_map([$this, 'transform'], $posts->items()),
        ];
        return response()->json($payload,200,[],JSON_PRETTY_PRINT);
    }

    public function withItem(post $post)
    {
        return response()->json($this->transform($post),200,[],JSON_PRETTY_PRINT);
    }
    
    public function transform(post $post)
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'content' => $post->content()->text,
            'view_count' => $post->view_count,
            'created' => $post->created_at->toIso8601String(),
            // 'attachments'  => $post->attachments->count(),
            // 'comments'     => $post->comments->count(),
            'links' => [
                [
                    'rel' => 'self',
                    'href' => route('dev.api.posts.show', $post->id),
                ],
            ],
        ];
    }
}