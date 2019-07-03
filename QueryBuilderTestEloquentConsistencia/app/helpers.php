<?php

function seleccionado($nombreEnlace) {
   return request()->routeIs($nombreEnlace) ? 'activo' : '';
}