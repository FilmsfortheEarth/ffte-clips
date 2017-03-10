<?php namespace Ffte\Clips\Models;

use Ffte\Clips\Classes\ClipInfoService;
use October\Rain\Database\Model;
use Debugbar;

/**
 * Model
 */
class Clip extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /*
     * Validation
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'ffte_clips_clips';


    public function beforeSave() {

        $service = new ClipInfoService();

        $clipInfo = $service->getProvider($this->url);
        if($clipInfo) {
            $this->embedUrl = $clipInfo->getEmbedUrl();
        } else {
            $this->embedUrl = '';
        }

    }
}