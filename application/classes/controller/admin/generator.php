<?php
class Controller_Admin_Generator extends Controller{
    public function action_index() {
        echo HTML::anchor('admin/generator/export', 'Generate models from DB');
        echo '<br/>';
        echo HTML::anchor('admin/generator/import', 'Create DB from Models');
        echo '<br/>';
        echo HTML::anchor('admin/generator/backup_existed', 'Backup existed');
    }

    public function action_export() {
        $options = array(
                 'generateBaseClasses'   =>  true,
                 'baseClassesPrefix'     =>  'Base',
                 'baseClassesDirectory'  =>  'base',
                 'baseClassName'         =>  'Doctrine_Record');
        try {
            // Backup first
            $sPath = $this->action_backup_existed();
            $objectsBackup = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sPath), RecursiveIteratorIterator::SELF_FIRST);
            foreach($objectsBackup as $bname => $bobject){
                chmod($bname, 0777);
            }
            echo 'Backed up!', '<br/>';
            
            // Generate new
            Doctrine_Core::generateModelsFromDb(APPPATH.'models', array(), $options);
            Doctrine::generateYamlFromDb(APPPATH.'models/schema.yml');
            echo 'Generated to '.APPPATH.'models', '<br/>';
            // Iterate and chmod
            $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(APPPATH.'models'), RecursiveIteratorIterator::SELF_FIRST);
            foreach($objects as $name => $object){
                echo "$name<br/>";
                chmod($name, 0777);
            }
        }
        catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    /**
     * @stub
     * 
     * @todo Implement import to DB
     */
    public function action_import() {
        try {
            echo Doctrine::generateSqlFromModels(APPPATH.'models');
        }
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }

    public function action_backup_existed(){
        try {
            $sBackupPath = DOCROOT.'backups/'.date('YmdHi');
            if(!is_dir($sBackupPath)){
                mkdir($sBackupPath);
                chmod($sBackupPath, 0777);
            }

            $this->_doRecursiveCopy(APPPATH.'models', $sBackupPath);
            return $sBackupPath;
        }
        catch (Exception $exc) {
            echo '<pre>';
            print_r($exc->getMessage());
            echo '</pre>';
        }

    }

    protected function _doRecursiveCopy($src, $dst, $mode = 0777){
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->_doRecursiveCopy($src . '/' . $file, $dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                    chmod($dst . '/' . $file, $mode);
                }
            }
        }
        closedir($dir);
    }
}

