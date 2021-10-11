<?php

function hasActive()
{
    $consultationsModel = model('App\Models\ConsultationsModel');
    $active_consultation = $consultationsModel
        ->where('lycean_id_no', getIdNo())->where('status', 'active')
        ->find();

    if ($active_consultation) {
        return true;
    }
    return false;
}

function hasPending()
{
    $consultationsModel = model('App\Models\ConsultationsModel');
    $pending_consultation = $consultationsModel
        ->where('lycean_id_no', getIdNo())->where('status', 'pending')
        ->find();

    if ($pending_consultation) {
        return true;
    }
    return false;
}