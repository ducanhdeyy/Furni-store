<?php

namespace App\Repository\Blog;

use App\Models\Blog;
use App\Repository\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{

    public function getModel(): string
    {
        return Blog::class;
    }

    public function getBlog()
    {
        return $this->model->search()->paginate(5);
    }


    public function store($request)
    {
        $linkImage = '';
        try {
            DB::beginTransaction();
            $blogs = [
                'user_id'=>$request->user_id,
                'title'=>$request->title,
                'content'=>$request->content,
                'status'=>$request->status,
            ];
            if ($request->hasFile('path_image')){
                upload_img('blog', $request);
                $linkImage = $request->input('path_image');
                $blogs['path_image'] = $linkImage;
            }
            $this->create($blogs);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm Mới Thành Công');
        }catch (\Exception $err){
            Log::error("Message". $err->getMessage() . "line :" .$err->getLine());
            File::delete(public_path($linkImage));
            return redirect()->back()->with('error', 'Thêm Mới Thất Bại');
        }

    }

    public  function edit($id, $request)
    {
        $linkImage = '';
        $linkImageOld = '';
        try {
            DB::beginTransaction();
            $blog = $this->find($id);
            $linkImageOld = $blog->path_image;
            $blogData = [
                'user_id'=>$request->user_id,
                'title'=>$request->title,
                'content'=>$request->content,
                'status'=>$request->status,
            ];

            if ($request->hasFile('path_image')){
                upload_img('blog', $request);
                $linkImage = $request->input('path_image');
                $blogData['path_image'] = $linkImage;
            }
            $blog->update($blogData);
            DB::commit();
            if ($request->hasFile('path_image')) {
                File::delete(public_path($linkImageOld));
            }
            return back()->with('success', 'Sửa Thành Công');
        }catch (\Exception $err){
            Log::error("Message". $err->getMessage() . "line :" .$err->getLine());
            File::delete(public_path($linkImage));
            return back()->with('error', 'Sửa Thất Bại');
        }

    }

    public function destroy($id)
    {
        $this->delete($id);
        return back()->with('success', 'Xóa Thành Công');
    }

    public function getHomeBlog()
    {
        return $this->model->orderBy('created_at', 'DESC')->limit(3)->get();
    }
    public function getBlogHome(){
        return $this->model->orderBy('created_at','DESC')->limit(9)->get();
    }

    public function getComment($id)
    {
       $blog = $this->find($id);
       return $blog->comments;
    }
}
