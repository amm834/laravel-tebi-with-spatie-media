<?php

namespace App\Services;

use DateTimeInterface;
use Spatie\MediaLibrary\Support\UrlGenerator\BaseUrlGenerator;

class TebiUrlGenerator extends BaseUrlGenerator
{

    public function getUrl(): string
    {
        return config('filesystems.disks.tebi.endpoint') . '/' . config('filesystems.disks.tebi.bucket') . '/' . $this->getPathRelativeToRoot();
    }

    public function getPath(): string
    {
        // TODO: Implement getPath() method.
    }

    public function getTemporaryUrl(DateTimeInterface $expiration, array $options = []): string
    {
        return $this
            ->filesystemManager
            ->disk($this->media->disk)
            ->temporaryUrl($this->getPath(), $expiration, $options);
    }

    public function getResponsiveImagesDirectoryUrl(): string
    {
        return config('medialibrary.s3.domain') . '/' . $this->pathGenerator->getPathForResponsiveImages($this->media);
    }
}
