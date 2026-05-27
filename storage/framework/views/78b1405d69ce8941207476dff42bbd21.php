<?php if (isset($component)) { $__componentOriginal81a506f898233b9e7d58286e6bea3c18 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal81a506f898233b9e7d58286e6bea3c18 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'f4ac99e09542ff494432bc959d4fee61::app','data' => ['title' => __('Dashboard')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts::app'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Dashboard'))]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

    <div class="p-6">
        <div class="mb-8">
            <h1 class="text-2xl font-semibold text-zinc-900 dark:text-zinc-100"><?php echo e(__('Dashboard')); ?></h1>
            <p class="mt-1 text-sm text-zinc-500 dark:text-zinc-400"><?php echo e(__('Overview of your portfolio')); ?></p>
        </div>

        <?php
            $projectCount = \App\Models\Project::count();
            $experienceCount = \App\Models\Experience::count();
            $skillCount = \App\Models\Skill::count();
            $profile = \App\Models\Profile::first();
        ?>

        
        <div class="grid gap-4 md:grid-cols-4 mb-8">
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-indigo-100 dark:bg-indigo-500/10">
                        <?php if (isset($component)) { $__componentOriginal9d976d16d2d40e73349b791bdc546089 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9d976d16d2d40e73349b791bdc546089 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.folder','data' => ['class' => 'size-5 text-indigo-600 dark:text-indigo-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.folder'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-indigo-600 dark:text-indigo-400']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9d976d16d2d40e73349b791bdc546089)): ?>
<?php $attributes = $__attributesOriginal9d976d16d2d40e73349b791bdc546089; ?>
<?php unset($__attributesOriginal9d976d16d2d40e73349b791bdc546089); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9d976d16d2d40e73349b791bdc546089)): ?>
<?php $component = $__componentOriginal9d976d16d2d40e73349b791bdc546089; ?>
<?php unset($__componentOriginal9d976d16d2d40e73349b791bdc546089); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400"><?php echo e(__('Projects')); ?></p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100"><?php echo e($projectCount); ?></p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-emerald-100 dark:bg-emerald-500/10">
                        <?php if (isset($component)) { $__componentOriginalc88322ae7a991a4d285d3bf35e6f7f6c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc88322ae7a991a4d285d3bf35e6f7f6c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.briefcase','data' => ['class' => 'size-5 text-emerald-600 dark:text-emerald-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.briefcase'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-emerald-600 dark:text-emerald-400']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc88322ae7a991a4d285d3bf35e6f7f6c)): ?>
<?php $attributes = $__attributesOriginalc88322ae7a991a4d285d3bf35e6f7f6c; ?>
<?php unset($__attributesOriginalc88322ae7a991a4d285d3bf35e6f7f6c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc88322ae7a991a4d285d3bf35e6f7f6c)): ?>
<?php $component = $__componentOriginalc88322ae7a991a4d285d3bf35e6f7f6c; ?>
<?php unset($__componentOriginalc88322ae7a991a4d285d3bf35e6f7f6c); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400"><?php echo e(__('Experiences')); ?></p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100"><?php echo e($experienceCount); ?></p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-amber-100 dark:bg-amber-500/10">
                        <?php if (isset($component)) { $__componentOriginal7dbc05838c17e1e397a9753ab5f157f6 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7dbc05838c17e1e397a9753ab5f157f6 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.light-bulb','data' => ['class' => 'size-5 text-amber-600 dark:text-amber-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.light-bulb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-amber-600 dark:text-amber-400']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7dbc05838c17e1e397a9753ab5f157f6)): ?>
<?php $attributes = $__attributesOriginal7dbc05838c17e1e397a9753ab5f157f6; ?>
<?php unset($__attributesOriginal7dbc05838c17e1e397a9753ab5f157f6); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7dbc05838c17e1e397a9753ab5f157f6)): ?>
<?php $component = $__componentOriginal7dbc05838c17e1e397a9753ab5f157f6; ?>
<?php unset($__componentOriginal7dbc05838c17e1e397a9753ab5f157f6); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400"><?php echo e(__('Skills')); ?></p>
                        <p class="text-2xl font-bold text-zinc-900 dark:text-zinc-100"><?php echo e($skillCount); ?></p>
                    </div>
                </div>
            </div>

            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-lg bg-pink-100 dark:bg-pink-500/10">
                        <?php if (isset($component)) { $__componentOriginal87e883c336cb6c1575660c48879fa4da = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal87e883c336cb6c1575660c48879fa4da = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'e60dd9d2c3a62d619c9acb38f20d5aa5::icon.user-circle','data' => ['class' => 'size-5 text-pink-600 dark:text-pink-400']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('flux::icon.user-circle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'size-5 text-pink-600 dark:text-pink-400']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal87e883c336cb6c1575660c48879fa4da)): ?>
<?php $attributes = $__attributesOriginal87e883c336cb6c1575660c48879fa4da; ?>
<?php unset($__attributesOriginal87e883c336cb6c1575660c48879fa4da); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal87e883c336cb6c1575660c48879fa4da)): ?>
<?php $component = $__componentOriginal87e883c336cb6c1575660c48879fa4da; ?>
<?php unset($__componentOriginal87e883c336cb6c1575660c48879fa4da); ?>
<?php endif; ?>
                    </div>
                    <div>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400"><?php echo e(__('Profile')); ?></p>
                        <p class="text-base font-semibold text-zinc-900 dark:text-zinc-100 truncate"><?php echo e($profile?->name ?? '—'); ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2">
            
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100"><?php echo e(__('Recent Projects')); ?></h2>
                    <a href="<?php echo e(route('projects.index')); ?>" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition"><?php echo e(__('View all')); ?> →</a>
                </div>
                <?php $recentProjects = \App\Models\Project::latest()->take(5)->get(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentProjects->isNotEmpty()): ?>
                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recentProjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 min-w-0">
                                    <span class="block size-2 shrink-0 rounded-full bg-gradient-to-r <?php echo e($project->color); ?>"></span>
                                    <span class="text-sm text-zinc-700 dark:text-zinc-300 truncate"><?php echo e($project->title); ?></span>
                                </div>
                                <span class="text-xs text-zinc-500 shrink-0"><?php echo e($project->created_at->diffForHumans()); ?></span>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-zinc-500"><?php echo e(__('No projects yet.')); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100"><?php echo e(__('Recent Experiences')); ?></h2>
                    <a href="<?php echo e(route('experiences.index')); ?>" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition"><?php echo e(__('View all')); ?> →</a>
                </div>
                <?php $recentExperiences = \App\Models\Experience::latest()->take(5)->get(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($recentExperiences->isNotEmpty()): ?>
                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $recentExperiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="flex items-center justify-between">
                                <div class="min-w-0">
                                    <p class="text-sm text-zinc-700 dark:text-zinc-300 truncate"><?php echo e($exp->role); ?></p>
                                    <p class="text-xs text-zinc-500 truncate"><?php echo e($exp->company); ?></p>
                                </div>
                                <span class="text-xs text-zinc-500 shrink-0 ml-3"><?php echo e($exp->period); ?></span>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php else: ?>
                    <p class="text-sm text-zinc-500"><?php echo e(__('No experiences yet.')); ?></p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div class="mt-6 rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-900 p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold text-zinc-900 dark:text-zinc-100"><?php echo e(__('Skills')); ?></h2>
                <a href="<?php echo e(route('skills.index')); ?>" wire:navigate class="text-xs text-indigo-500 hover:text-indigo-400 transition"><?php echo e(__('Manage')); ?> →</a>
            </div>
            <?php $allSkills = \App\Models\Skill::orderBy('sort_order')->pluck('name'); ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($allSkills->isNotEmpty()): ?>
                <div class="flex flex-wrap gap-2">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $allSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <span class="rounded-full border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800 px-3 py-1 text-xs text-zinc-600 dark:text-zinc-400"><?php echo e($skill); ?></span>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            <?php else: ?>
                <p class="text-sm text-zinc-500"><?php echo e(__('No skills yet.')); ?></p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal81a506f898233b9e7d58286e6bea3c18)): ?>
<?php $attributes = $__attributesOriginal81a506f898233b9e7d58286e6bea3c18; ?>
<?php unset($__attributesOriginal81a506f898233b9e7d58286e6bea3c18); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal81a506f898233b9e7d58286e6bea3c18)): ?>
<?php $component = $__componentOriginal81a506f898233b9e7d58286e6bea3c18; ?>
<?php unset($__componentOriginal81a506f898233b9e7d58286e6bea3c18); ?>
<?php endif; ?>
<?php /**PATH C:\laragon\www\portfolio-app-v2\resources\views/dashboard.blade.php ENDPATH**/ ?>