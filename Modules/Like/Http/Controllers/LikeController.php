<?php

namespace Modules\Like\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function toggle(Request $request)
    {

        $request->validate([
            'type' => 'required',
            'id'   => 'required',
        ]);

        $class = Relation::getMorphedModel($request->type);

        abort_unless($class, 404);

        $model = $class::findOrFail($request->id);

        $liked = $model->toggleLike();

        return response()->json([
            'success' => true,
            'count' => $model->likes()->count(),
            'liked' => $model->isLikedByUser(auth()->id())
        ]);
    }

    public function count(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'id'   => 'required|integer',
        ]);

        $class = Relation::getMorphedModel($request->type);

        abort_unless($class, 404);

        $model = $class::findOrFail($request->id);

        return response()->json([
            'count' => $model->likes()->count(),
        ]);
    }

}
