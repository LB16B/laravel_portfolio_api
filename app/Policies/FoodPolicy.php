<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Food;
use App\Models\User;

class FoodPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Food $food): bool
    {
        // ユーザーがrecipeテーブルの所有者である場合にのみ表示を許可
        return $user->id === $food->recipe->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // 一般的に、全てのユーザーが作成できる場合は true を返します。
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Food $food): bool
    {
        // ユーザーがrecipeテーブルの所有者である場合にのみ更新を許可
        return $user->id === $food->recipe->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Food $food): bool
    {
        if ($user->isAdmin() || $user->id === $food->recipe->user_id) {
            return true; // 管理者またはレシピの所有者の場合、削除を許可します。
        }

        return false; // それ以外の場合、削除を許可しないことを明示的に示します。
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Food $food): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Food $food): bool
    {
        //
    }
}
