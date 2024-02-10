<?php

function get_image_from_storage($model)
{
    if($model->image) {
        return asset('storage') . '/' . $model->image;
    }
    return 'https://via.placeholder.com/1080x720';
}
