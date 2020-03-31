<?php

namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'gula akunting');

// Project repository
set('repository', 'git@github.com:fendysketsa/salon-akunting.git');
set('branch', 'master');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', false);

//set('writable_mode', 'chown');

// Shared files/dirs between deploys
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server
add('writable_dirs', []);
set('http_user', 'admin');

// Hosts

host('68.183.182.57')
    ->user('admin')
    ->identityFile('/home/layana/.ssh/gula_server_rsa')
    ->set('deploy_path', '/home/admin/web/akunting.gulawaxing.com/public_html');

// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

//before('deploy:symlink', 'artisan:migrate');