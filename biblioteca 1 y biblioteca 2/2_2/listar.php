<?php
/**
 * Bases de datos 2-2 - listar.php
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
cabecera("Listar", MENU_VOLVER, CABECERA_SIN_CURSOR);

$campo = recogeCampo("campo", "apellidos");
$orden = recogeOrden("orden", "ASC");

$consulta = "SELECT COUNT(*) FROM $dbTabla";
$result = $db->query($consulta);
if (!$result) {
    print "<p>Error en la consulta.</p>\n";
} elseif ($result->fetchColumn() ==0 ) {
    print "<p>No se ha creado todav�a ning�n registro.</p>\n";
} else {
    $consulta = "SELECT * FROM $dbTabla
        ORDER BY $campo $orden";
    $result = $db->query($consulta);
    if (!$result) {
        print "<p>Error en la consulta.</p>\n";
    } else {
        print "<p>Listado completo de registros:</p>\n<table border=\"1\">
  <thead>
    <tr class=\"neg\">
      <th><a href=\"$_SERVER[PHP_SELF]?campo=nombre&amp;orden=ASC\">
        <img src=\"abajo.png\" alt=\"A-Z\" title=\"A-Z\" /></a>
        Nombre
        <a href=\"$_SERVER[PHP_SELF]?campo=nombre&amp;orden=DESC\">
        <img src=\"arriba.png\" alt=\"Z-A\" title=\"Z-A\" /></a></th>
      <th><a href=\"$_SERVER[PHP_SELF]?campo=apellidos&amp;orden=ASC\">
        <img src=\"abajo.png\" alt=\"A-Z\" title=\"A-Z\" /></a>
        Apellidos
        <a href=\"$_SERVER[PHP_SELF]?campo=apellidos&amp;orden=DESC\">
        <img src=\"arriba.png\" alt=\"Z-A\" title=\"Z-A\" /></a></th>
    </tr>
  </thead>
  <tbody>\n";
        foreach ($result as $valor) {
            print "    <tr>
      <td>$valor[nombre]</td>
      <td>$valor[apellidos]</td>
    </tr>\n";
        }
        print "  </tbody>\n</table>\n";
    }
}

$db = NULL;
pie();
?>
