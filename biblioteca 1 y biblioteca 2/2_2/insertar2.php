<?php
/**
 * Bases de datos 2-2 - insertar2.php
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
cabecera("A�adir 2", MENU_VOLVER, CABECERA_SIN_CURSOR);

$nombre    = recoge("nombre");
$apellidos = recoge("apellidos");

if ($nombre == "" && $apellidos == "") {
    print "<p>Hay que rellenar al menos uno de los campos. "
        . "No se ha guardado el registro.</p>\n";
} else {
    $consulta = "SELECT COUNT(*) FROM $dbTabla";
    $result = $db->query($consulta);
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } elseif ($result->fetchColumn() >= MAX_REG_TABLA) {
        print "<p>Se ha alcanzado el n�mero m�ximo de registros que se pueden "
            . "guardar.</p>\n<p>Por favor, borre alg�n registro antes.</p>\n";
    } else {
        $consulta = "SELECT COUNT(*) FROM $dbTabla
            WHERE nombre=:nombre
            AND apellidos=:apellidos";
        $result = $db->prepare($consulta);
        $result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos));
        if (!$result) {
            print "<p>Error en la consulta.</p>\n";
        } elseif ($result->fetchColumn() > 0) {
            print "<p>El registro ya existe.</p>\n";
        } else {
            $consulta = "INSERT INTO $dbTabla
                (nombre, apellidos)
                VALUES (:nombre, :apellidos)";
            $result = $db->prepare($consulta);
            if ($result->execute(array(":nombre" => $nombre, ":apellidos" => $apellidos))) {
                print "<p>Registro <strong>$nombre $apellidos</strong> creado correctamente.</p>\n";
            } else {
                print "<p>Error al crear el registro <strong>$nombre $apellidos</strong>.</p>\n";
            }
        }
    }
}

$db = NULL;
pie();
?>
