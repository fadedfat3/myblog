<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            
            'content' => 'required',
            
            
        ];
    }

    /**
     * Return the fields and values to create a new post from
     */
    public function postFillData()
    {
        $published_at = Carbon::now();
        return [
            'title' => $this->title,
            'content_raw' => $this->get('content'),
            'meta_description' => ltrim($this->meta_description),
            'is_draft' => $this->action === 'continue' ? 1 : 0,
            'published_at' => $published_at,
            
        ];
    }
}
