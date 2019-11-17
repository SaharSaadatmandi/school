<?php

namespace App\Models;

use DB;
use Illuminate\Support\Collection;

class Topic
{
    const table = 'lecturetopic';

    /**
     * Retrieve the list of all students
     *
     * @return \Illuminate\Support\Collection
     */
    public static function retrieve(): Collection
    {

        return DB::table(static::table)
            ->select([
                static::table . '.*'
            ])
            ->orderBy(static::table . '.id','DESC')
            ->get();

    }

    /**
     * Retrieve company by id
     *
     * @param int $id
     * @return mixed
     */
    public static function retrieveById(int $id)
    {

        return DB::table(static::table)->find($id);
    }


    public static function save(array $data, $id = null): int
    {
        if ($id) {
            \DB::table(static::table)->where('id', $id)->update($data);

            return $id;
        }

        return \DB::table(static::table)->insertGetId($data);
    }

    public static function delete(int $id): int
    {
        return DB::table(static::table)->where('id', $id)->delete();
    }

    public static function retrieveTeachersPagination(int $id)
    {
        return  DB::table(static::table)
            ->join('teacher', 'lecturetopic.idTeach', '=', 'teacher.id')
            ->where('teacher.id', $id)
            ->orderby('date', 'desc')
            ->paginate(10);

    }


}
