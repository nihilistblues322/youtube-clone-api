<?php

namespace Database\Seeders;

use App\Models\Video;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Video::take(3)->get()
            ->map(
                fn(Video $video) =>
                static::seedCommentsFor($video)

            )->flatten()->each(
                fn(Comment $comment) =>
                static::associateParentCommentWith($comment)
            );
    }
    private static function seedCommentsFor(Video $video)
    {
        $comments = Comment::factory(10)->create();

        $video->comments()->saveMany($comments);

        return $comments;
    }
    private static function associateParentCommentWith(Comment $comment)
    {
        if ($comment->replies->isNotEmpty())
            return;
        $comment->parent()->associate(static::findRandomCommentThatCanBeParentOf($comment))->save();
    }

    private static function findRandomCommentThatCanBeParentOf(Comment $comment)
    {
        return $comment->video
            ->comments()->doesntHave('parent')
            ->where('id', '<>', $comment->id)
            ->inRandomOrder()
            ->first();
    }
}