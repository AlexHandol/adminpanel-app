<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Account $account)
    {
        $comment = new Comment();
        $comment->account_id = $account->id;
        $comment->user_id = auth()->id();
        $comment->comment_type = request()->get('comment_type');
        $comment->comment_content = request()->get('comment_content');
        $comment->save();

        return redirect()->route('accounts.view.show', $account->id)->with('success', "Comment posted successfully!");
    }
}
