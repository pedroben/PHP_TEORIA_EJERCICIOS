<?php
/**
 * Bases de datos 2-2 - modificar3.php
 *
 * @author    Bartolom� Sintes Marco <bartolome.sintes+mclibre@gmail.com>
 * @copyright 2012 Bartolom� Sintes Marco
 * @license   http://www.gnu.org/licenses/agpl.txt AGPL 3 or later
 * @version   2012-11-27
 * @link      http://www.mclibre.org
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once "biblioteca.php";

$db = conectaDb();
cabecera("Modificar 3", MENU_VOLVER, CABECERA_SIN_CURSOR);

$nombre    = recoge("nombre");
$apellidos = recoge("apellidos");
$id        = recoge("id");

if ($id == "") {
    print "<p>No se ha seleccionado ning�n registro.</p>\n";
} elseif ($nombre == "" && $apellidos == "") {
    print "<p>Hay que rellenar al menos uno de los campos. "
        . "No se ha guardado la modificaci�n.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $dbTabla
        WHERE id=:id";
    $result = $db->prepare($consulta);
    $result->execute(array(":id" => $id));
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } elseif ($result->fetchColumn() == 0) {
        print "<p>Registro no encontrado.</p>\n";
    } else {
        // La consulta cuenta los registros con un id diferente porque MySQL no distingue
        // may�sculas de min�sculas y si en un registro s�lo se cambian may�sculas por
        // min�sculas MySQL dir�a que ya hay un registro como el que se quiere guardar.
        $consulta = "SELECT COUNT(*) FROM $dbTabla
            WHERE nombre=:nombre
            AND apellidos=:apellidos
            AND id<>:id";
        $result = $db->prepare($consulta);
        $result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos,
             ":id" => $id));
        if (!$result) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($result->fetchColumn() > 0) {
            print "<p>Ya existe un registro con esos mismos valores. "
                . "No se ha guardado la modificaci�n.</p>\n";
        } else {
            $consulta = "UPDATE $dbTabla
                SET nombre=:nombre, apellidos=:apellidos
                WHERE id=:id";
            $result = $db->prepare($consulta);
            if ($result->execute(array(":nombre" => $nombre,
                ":apellidos" => $apellidos, ":id" => $id))) {
                print "<p>Registro modificado correctamente.</p>\n";
            } else {
                print "<p>Error al modificar el registro.</p>\n";
            }
        }
    }
}

$db = NULL;
pie();
?>
