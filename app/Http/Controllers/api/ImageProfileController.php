<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageProfileRequest;
use App\Models\User;

class ImageProfileController extends Controller
{
    public function UploadImageProfile(ImageProfileRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('avatar_image'))
        {
            if ($request->file('avatar_image')) {
                $validated['avatar_image'] = $request->file('avatar_image')->store('src/image/avatar', 'public');
            }
            $user_id = $request->idUser;
            User::query()->where('id', '=', $user_id)->update($validated);
            return response()->json(['success' => true, 'message' => 'Изображение успешно загружено']);
        }
        return response()->json(['success' => false, 'message' => 'Изображение не найдено']);
    }
}
