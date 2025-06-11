<?php

declare(strict_types=1);

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

/**
 * @mixin \Illuminate\View\View
 *
 * @method static \Illuminate\View\View make(string $view, array $data = [], array $mergeData = [])
 * @method \Illuminate\View\View layout(string $viewName, array $data = [])
 * @method \Illuminate\View\View layoutData(array $data = [])
 * @method \Illuminate\View\View extends(string $view, array $data = [])
 * @method \Illuminate\View\View section(string $sectionName, string $content = '')
 * @method \Illuminate\View\View slot(string $slotName)
 */
interface View extends Renderable {}
