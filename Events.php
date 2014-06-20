<?php

/*
 * This file is part of the Manuel Aguirre Project.
 *
 * (c) Manuel Aguirre <programador.manuel@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Manuelj555\Bundle\UploadDataBundle;

/**
 *
 * @author Manuel Aguirre <programador.manuel@gmail.com>
 */
interface Events
{

    const PRE_READ = 'upload_data.pre_read.%s';
    const POST_READ= 'upload_data.post_read.%s';
    const VALIDATE = 'upload_data.validate.%s';

}
