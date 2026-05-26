<?php

namespace App\Http\Controllers;

use DB;
use Throwable;

abstract class Controller
{
    /**
     * Handle any exception that occurs when executing a destroy request
     * @param Throwable $ex
     * @return \Illuminate\Http\RedirectResponse
     */
    protected final function handleExceptionBackWithErrors(Throwable $ex) {
        DB::rollBack();
        return redirect()->back()->withErrors([
            'error' => $ex->getMessage()                        
        ]);
    }

    /**
     * Handle any exception that occurs when executing a destroy request
     * @param Throwable $ex
     */
    protected final function handleExceptionAPI(Throwable $ex) {
        DB::rollBack();
        return response()->json(['code' => $ex->getCode(), 'message' => $ex->getMessage()]);
    }
}
