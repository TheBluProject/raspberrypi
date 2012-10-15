<?php
  /*

  All Emoncms code is released under the GNU Affero General Public License.
  See COPYRIGHT.txt and LICENSE.txt.

  ---------------------------------------------------------------------
  Emoncms - open source energy visualisation
  Part of the OpenEnergyMonitor project:
  http://openenergymonitor.org
 
  */

  function raspberrypi_get()
  {
    $result = db_query("SELECT * FROM raspberrypi");
    $row = db_fetch_array($result);

    if (!$row)
    {
      db_query("INSERT INTO raspberrypi ( userid, apikey, sgroup ,frequency, baseid ) VALUES ( '0' , '' ,'1','4','15' );");
      $result = db_query("SELECT * FROM raspberrypi");
      $row = db_fetch_array($result);
    }
    return $row;
  }

  function raspberrypi_set($userid,$apikey,$sgroup,$frequency,$baseid)
  {
    db_query("UPDATE raspberrypi SET `userid` = '$userid', `apikey` = '$apikey', `sgroup` = '$sgroup', `frequency` = '$frequency', `baseid` = '$baseid' ");
  }

  function raspberrypi_running()
  { 
    $time = time();
    db_query("UPDATE raspberrypi SET `running` = '$time' ");
  }

?>
