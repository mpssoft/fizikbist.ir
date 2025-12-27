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
            'type' => 'required|string',
            'id'   => 'required|integer',
        ]);

        $class = Relation::getMorphedModel($request->type);

        abort_unless($class, 404);

        $model = $class::findOrFail($request->id);

        $liked = $model->toggleLike();

        return response()->json([
            'liked' => $liked,
            'count' => $model->likes()->count(),
        ]);
    }

}
