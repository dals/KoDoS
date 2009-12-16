<?php
class Controller_Admin_Generator /*extends Base_Backend*/extends Controller_Smarty {

    public function action_index() {
        echo HTML::anchor('admin/generator/export', 'Generate models from DB');
        echo '<br/>';
        echo HTML::anchor('admin/generator/import', 'Create DB from Models');
        echo '<br/>';
        echo HTML::anchor('admin/generator/backup_existed', 'Backup existed');
    }

    public function action_export() {
        $options = array(
                 'generateBaseClasses'   =>  false,
                 'baseClassName'         =>  'Doctrine_Record');
        try {
            /**
             * Backup first
             */
            $sBackupPath = $this->action_backup_existed();

            $objectsBackup = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sBackupPath), RecursiveIteratorIterator::SELF_FIRST);
            foreach($objectsBackup as $bname => $bobject){
                chmod($bname, 0777);
            }
            echo 'Backed up!', '<br/><hr/>';
            
            /**
             * Generate new Doctrine models
             */
            $sModelsPath =  APPPATH.'models/';
            $sDoctrineGeneratedBase = 'base/';
            $sGenerateDoctrinePath = $sModelsPath.$sDoctrineGeneratedBase;
            
            Doctrine_Core::generateModelsFromDb($sGenerateDoctrinePath, array(), $options);
            Doctrine::generateYamlFromDb($sGenerateDoctrinePath.'/schema.yml');
            
            echo 'Generated to '.$sGenerateDoctrinePath, '<br/>';
            // Iterate and chmod
            $oFilesObjects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sModelsPath), RecursiveIteratorIterator::SELF_FIRST);
            foreach($oFilesObjects as $name => $object){
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
            //echo Doctrine::generateSqlFromModels(APPPATH.'models');
            echo Doctrine::generateSqlFromModels(APPPATH.'models');
            //Doctrine_Core::createTablesFromModels(APPPATH.'models');
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

