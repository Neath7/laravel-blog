<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Post;
use Auth;

class UpdateBlogPost extends FormRequest
{
    private $post_id = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $this->post_id = $this->route('post');
        return Post::where('id', $this->post_id)
                  ->where('author_id', Auth::id())->exists();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts,title,' . $this->route('post') . '|max:255',
            'content' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'body.required'  => 'A message is required',
        ];
    }
}
