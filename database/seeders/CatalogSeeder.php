<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Opscale\NovaCatalogs\Models\Catalog;
use Opscale\NovaCatalogs\Models\CatalogItem;

class CatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Ejecutar migraciones primero
        $this->command->call('migrate');

        // CAT-001 - Ambiente de destino
        $catalog = Catalog::create([
            'key' => 'CAT-001',
            'name' => 'Ambiente de destino',
            'description' => null,
        ]);

        $items = [
            ['00', 'Modo prueba'],
            ['01', 'Modo producción'],
        ];

        foreach ($items as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $catalog->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // CAT-002 - Tipo de Documento
        $catalog = Catalog::create([
            'key' => 'CAT-002',
            'name' => 'Tipo de Documento',
            'description' => null,
        ]);

        $items = [
            ['01', 'Factura'],
            ['03', 'Comprobante de crédito fiscal'],
            ['04', 'Nota de remisión'],
            ['05', 'Nota de crédito'],
            ['06', 'Nota de débito'],
            ['07', 'Comprobante de retención'],
            ['08', 'Comprobante de liquidación'],
            ['09', 'Documento contable de liquidación'],
            ['11', 'Facturas de exportación'],
            ['14', 'Factura de sujeto excluido'],
            ['15', 'Comprobante de donación'],
        ];

        foreach ($items as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $catalog->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // CAT-012 - Departamentos (como catálogo principal)
        $departamentosCatalog = Catalog::create([
            'key' => 'CAT-012',
            'name' => 'Departamento',
            'description' => 'Catálogo de departamentos de El Salvador',
        ]);

        // Departamento: AHUACHAPAN
        $dept01 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-01',
            'name' => 'AHUACHAPAN',
            'description' => 'Departamento',
        ]);

        // Municipios como items de AHUACHAPAN
        $municipiosItems = [
            ['13', 'AHUACHAPÁN NORTE'],
            ['14', 'AHUACHAPÁN CENTRO'],
            ['15', 'AHUACHAPÁN SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept01->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: AHUACHAPÁN NORTE
        $muni0113 = $dept01->catalogs()->create([
            'key' => 'CAT-013-0102',
            'name' => 'AHUACHAPÁN NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de AHUACHAPÁN NORTE
        $distritos = [
            ['03', 'Atiquizaya'],
            ['05', 'El Refugio'],
            ['06', 'San Lorenzo'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0113->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: AHUACHAPÁN CENTRO
        $muni0114 = $dept01->catalogs()->create([
            'key' => 'CAT-013-0101',
            'name' => 'AHUACHAPÁN CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de AHUACHAPÁN CENTRO
        $distritos = [
            ['02', 'Apaneca'],
            ['11', 'Tacuba'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0114->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: AHUACHAPÁN SUR
        $muni0115 = $dept01->catalogs()->create([
            'key' => 'CAT-013-0103',
            'name' => 'AHUACHAPÁN SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de AHUACHAPÁN SUR
        $distritos = [
            ['06', 'Guaymango'],
            ['07', 'Jujutla'],
            ['10', 'San Pedro Puxtla'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0115->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: SANTA ANA
        $dept02 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-02',
            'name' => 'SANTA ANA',
            'description' => 'Departamento',
        ]);

        // Municipios como items de SANTA ANA
        $municipiosItems = [
            ['14', 'SANTA ANA NORTE'],
            ['15', 'SANTA ANA CENTRO'],
            ['16', 'SANTA ANA ESTE'],
            ['17', 'SANTA ANA OESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept02->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SANTA ANA NORTE
        $muni0214 = $dept02->catalogs()->create([
            'key' => 'CAT-013-0203',
            'name' => 'SANTA ANA NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SANTA ANA NORTE
        $distritos = [
            ['06', 'Masahuat'],
            ['13', 'Texistepeque'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0214->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SANTA ANA CENTRO
        $muni0215 = $dept02->catalogs()->create([
            'key' => 'CAT-013-0201',
            'name' => 'SANTA ANA CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de SANTA ANA CENTRO
        $distritos = [
            ['10', 'Santa Ana'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0215->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SANTA ANA ESTE
        $muni0216 = $dept02->catalogs()->create([
            'key' => 'CAT-013-0202',
            'name' => 'SANTA ANA ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SANTA ANA ESTE
        $distritos = [
            ['03', 'Coatepeque'],
            ['04', 'El Congo'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0216->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SANTA ANA OESTE
        $muni0217 = $dept02->catalogs()->create([
            'key' => 'CAT-013-0204',
            'name' => 'SANTA ANA OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SANTA ANA OESTE
        $distritos = [
            ['01', 'Candelaria de la Frontera'],
            ['02', 'Chalchuapa'],
            ['05', 'El Porvenir'],
            ['08', 'San Antonio Pajonal'],
            ['12', 'Santiago de la Frontera'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0217->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: SONSONATE
        $dept03 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-03',
            'name' => 'SONSONATE',
            'description' => 'Departamento',
        ]);

        // Municipios como items de SONSONATE
        $municipiosItems = [
            ['17', 'SONSONATE NORTE'],
            ['18', 'SONSONATE CENTRO'],
            ['19', 'SONSONATE ESTE'],
            ['20', 'SONSONATE OESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept03->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SONSONATE NORTE
        $muni0317 = $dept03->catalogs()->create([
            'key' => 'CAT-013-0303',
            'name' => 'SONSONATE NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SONSONATE NORTE
        $distritos = [
            ['07', 'Nahuizalco'],
            ['12', 'Santa Catarina Masahuat'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0317->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SONSONATE CENTRO
        $muni0318 = $dept03->catalogs()->create([
            'key' => 'CAT-013-0301',
            'name' => 'SONSONATE CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de SONSONATE CENTRO
        $distritos = [
            ['08', 'Nahulingo'],
            ['10', 'San Antonio del Monte'],
            ['15', 'Sonsonate'],
            ['16', 'Sonzacate'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0318->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SONSONATE ESTE
        $muni0319 = $dept03->catalogs()->create([
            'key' => 'CAT-013-0302',
            'name' => 'SONSONATE ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SONSONATE ESTE
        $distritos = [
            ['02', 'Armenia'],
            ['03', 'Caluco'],
            ['05', 'Izalco'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0319->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SONSONATE OESTE
        $muni0320 = $dept03->catalogs()->create([
            'key' => 'CAT-013-0304',
            'name' => 'SONSONATE OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SONSONATE OESTE
        $distritos = [
            ['01', 'Acajutla'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0320->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: CHALATENANGO
        $dept04 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-04',
            'name' => 'CHALATENANGO',
            'description' => 'Departamento',
        ]);

        // Municipios como items de CHALATENANGO
        $municipiosItems = [
            ['34', 'CHALATENANGO NORTE'],
            ['35', 'CHALATENANGO CENTRO'],
            ['36', 'CHALATENANGO SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept04->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CHALATENANGO NORTE
        $muni0434 = $dept04->catalogs()->create([
            'key' => 'CAT-013-0402',
            'name' => 'CHALATENANGO NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de CHALATENANGO NORTE
        $distritos = [
            ['25', 'San Ignacio'],
            ['12', 'La Palma'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0434->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CHALATENANGO CENTRO
        $muni0435 = $dept04->catalogs()->create([
            'key' => 'CAT-013-0401',
            'name' => 'CHALATENANGO CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de CHALATENANGO CENTRO
        $distritos = [
            ['01', 'Agua Caliente'],
            ['13', 'La Reina'],
            ['18', 'San Fernando'],
            ['31', 'San Rafael'],
            ['32', 'Santa Rita'],
            ['33', 'Tejutla'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0435->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CHALATENANGO SUR
        $muni0436 = $dept04->catalogs()->create([
            'key' => 'CAT-013-0403',
            'name' => 'CHALATENANGO SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de CHALATENANGO SUR
        $distritos = [
            ['02', 'Arcatao'],
            ['03', 'Azacualpa'],
            ['04', 'Chalatenango'],
            ['09', 'El Carrizal'],
            ['11', 'La Laguna'],
            ['14', 'Las Vueltas'],
            ['17', 'Nueva Trinidad'],
            ['18', 'Ojos de Agua'],
            ['20', 'San Antonio de la Cruz'],
            ['26', 'San Isidro Labrador'],
            ['29', 'San Luis del Carmen'],
            ['30', 'San Miguel de Mercedes'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0436->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: LA LIBERTAD
        $dept05 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-05',
            'name' => 'LA LIBERTAD',
            'description' => 'Departamento',
        ]);

        // Municipios como items de LA LIBERTAD
        $municipiosItems = [
            ['23', 'LA LIBERTAD NORTE'],
            ['24', 'LA LIBERTAD CENTRO'],
            ['25', 'LA LIBERTAD OESTE'],
            ['26', 'LA LIBERTAD ESTE'],
            ['27', 'LA LIBERTAD COSTA'],
            ['28', 'LA LIBERTAD SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept05->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD NORTE
        $muni0523 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0504',
            'name' => 'LA LIBERTAD NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD NORTE
        $distritos = [
            ['13', 'Quezaltepeque'],
            ['17', 'San Pablo Tacachico'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0523->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD CENTRO
        $muni0524 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0501',
            'name' => 'LA LIBERTAD CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD CENTRO
        $distritos = [
            ['03', 'Ciudad Arce'],
            ['12', 'San Juan Opico'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0524->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD OESTE
        $muni0525 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0505',
            'name' => 'LA LIBERTAD OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD OESTE
        $distritos = [
            ['07', 'Jayaque'],
            ['14', 'Sacacoyo'],
            ['21', 'Tepecoyo'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0525->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD ESTE
        $muni0526 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0503',
            'name' => 'LA LIBERTAD ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD ESTE
        $distritos = [
            ['22', 'Zaragoza'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0526->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD COSTA
        $muni0527 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0502',
            'name' => 'LA LIBERTAD COSTA',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD COSTA
        $distritos = [
            ['08', 'Jicalapa'],
            ['09', 'La Libertad'],
            ['19', 'Tamanique'],
            ['20', 'Teotepeque'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0527->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA LIBERTAD SUR
        $muni0528 = $dept05->catalogs()->create([
            'key' => 'CAT-013-0506',
            'name' => 'LA LIBERTAD SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de LA LIBERTAD SUR
        $distritos = [
            ['05', 'Comasagua'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0528->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: SAN SALVADOR
        $dept06 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-06',
            'name' => 'SAN SALVADOR',
            'description' => 'Departamento',
        ]);

        // Municipios como items de SAN SALVADOR
        $municipiosItems = [
            ['20', 'SAN SALVADOR NORTE'],
            ['21', 'SAN SALVADOR OESTE'],
            ['22', 'SAN SALVADOR ESTE'],
            ['23', 'SAN SALVADOR CENTRO'],
            ['24', 'SAN SALVADOR SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept06->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN SALVADOR NORTE
        $muni0620 = $dept06->catalogs()->create([
            'key' => 'CAT-013-0603',
            'name' => 'SAN SALVADOR NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN SALVADOR NORTE
        $distritos = [
            ['01', 'Aguilares'],
            ['05', 'El Paisnal'],
            ['20', 'Guazapa'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0620->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN SALVADOR OESTE
        $muni0621 = $dept06->catalogs()->create([
            'key' => 'CAT-013-0604',
            'name' => 'SAN SALVADOR OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN SALVADOR OESTE
        $distritos = [
            ['02', 'Apopa'],
            ['09', 'Nejapa'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0621->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN SALVADOR ESTE
        $muni0622 = $dept06->catalogs()->create([
            'key' => 'CAT-013-0602',
            'name' => 'SAN SALVADOR ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN SALVADOR ESTE
        $distritos = [
            ['07', 'Ilopango'],
            ['17', 'Soyapango'],
            ['18', 'Tonacatepeque'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0622->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN SALVADOR CENTRO
        $muni0623 = $dept06->catalogs()->create([
            'key' => 'CAT-013-0601',
            'name' => 'SAN SALVADOR CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN SALVADOR CENTRO
        $distritos = [
            ['03', 'Ayutuxtepeque'],
            ['04', 'Cuscatancingo'],
            ['08', 'Mejicanos'],
            ['14', 'San Salvador'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0623->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN SALVADOR SUR
        $muni0624 = $dept06->catalogs()->create([
            'key' => 'CAT-013-0605',
            'name' => 'SAN SALVADOR SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN SALVADOR SUR
        $distritos = [
            ['10', 'Panchimalco'],
            ['11', 'Rosario de Mora'],
            ['12', 'San Marcos'],
            ['15', 'Santiago Texacuangos'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0624->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: CUSCATLAN
        $dept07 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-07',
            'name' => 'CUSCATLAN',
            'description' => 'Departamento',
        ]);

        // Municipios como items de CUSCATLAN
        $municipiosItems = [
            ['17', 'CUSCATLÁN NORTE'],
            ['18', 'CUSCATLÁN SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept07->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CUSCATLÁN NORTE
        $muni0717 = $dept07->catalogs()->create([
            'key' => 'CAT-013-0701',
            'name' => 'CUSCATLÁN NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de CUSCATLÁN NORTE
        $distritos = [
            ['07', 'San Bartolomé Perulapía'],
            ['15', 'Suchitoto'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0717->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CUSCATLÁN SUR
        $muni0718 = $dept07->catalogs()->create([
            'key' => 'CAT-013-0702',
            'name' => 'CUSCATLÁN SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de CUSCATLÁN SUR
        $distritos = [
            ['01', 'Candelaria'],
            ['02', 'Cojutepeque'],
            ['05', 'El Carmen'],
            ['07', 'El Rosario'],
            ['05', 'Monte San Juan'],
            ['11', 'San Rafael Cedros'],
            ['13', 'Santa Cruz Analquito'],
            ['14', 'Santa Cruz Michapa'],
            ['16', 'Tenancingo'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0718->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: LA PAZ
        $dept08 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-08',
            'name' => 'LA PAZ',
            'description' => 'Departamento',
        ]);

        // Municipios como items de LA PAZ
        $municipiosItems = [
            ['23', 'LA PAZ OESTE'],
            ['24', 'LA PAZ CENTRO'],
            ['25', 'LA PAZ ESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept08->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA PAZ OESTE
        $muni0823 = $dept08->catalogs()->create([
            'key' => 'CAT-013-0803',
            'name' => 'LA PAZ OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA PAZ OESTE
        $distritos = [
            ['05', 'Olocuilta'],
            ['09', 'San Francisco Chinameca'],
            ['11', 'San Juan Talpa'],
            ['13', 'San Luis Talpa'],
            ['15', 'San Pedro Masahuat'],
            ['20', 'Tapalhuaca'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0823->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA PAZ CENTRO
        $muni0824 = $dept08->catalogs()->create([
            'key' => 'CAT-013-0801',
            'name' => 'LA PAZ CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de LA PAZ CENTRO
        $distritos = [
            ['07', 'San Antonio Masahuat'],
            ['12', 'San Juan Tepezontes'],
            ['14', 'San Miguel Tepezontes'],
            ['16', 'San Pedro Nonualco'],
            ['10', 'Santiago Nonualco'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0824->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA PAZ ESTE
        $muni0825 = $dept08->catalogs()->create([
            'key' => 'CAT-013-0802',
            'name' => 'LA PAZ ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA PAZ ESTE
        $distritos = [
            ['10', 'San Juan Nonualco'],
            ['17', 'San Rafael Obrajuelo'],
            ['21', 'Zacatecoluca'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0825->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: CABAÑAS
        $dept09 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-09',
            'name' => 'CABAÑAS',
            'description' => 'Departamento',
        ]);

        // Municipios como items de CABAÑAS
        $municipiosItems = [
            ['10', 'CABAÑAS ESTE'],
            ['11', 'CABAÑAS OESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept09->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CABAÑAS ESTE
        $muni0910 = $dept09->catalogs()->create([
            'key' => 'CAT-013-0901',
            'name' => 'CABAÑAS ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de CABAÑAS ESTE
        $distritos = [
            ['09', 'Dolores / Villa Dolores'],
            ['02', 'Guacotecti'],
            ['20', 'San Isidro'],
            ['06', 'Sensuntepeque'],
            ['08', 'Victoria'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0910->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: CABAÑAS OESTE
        $muni0911 = $dept09->catalogs()->create([
            'key' => 'CAT-013-0902',
            'name' => 'CABAÑAS OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de CABAÑAS OESTE
        $distritos = [
            ['01', 'Cinquera'],
            ['03', 'Ilobasco'],
            ['04', 'Jutiapa'],
            ['07', 'Tejutepeque'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni0911->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: SAN VICENTE
        $dept10 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-10',
            'name' => 'SAN VICENTE',
            'description' => 'Departamento',
        ]);

        // Municipios como items de SAN VICENTE
        $municipiosItems = [
            ['14', 'SAN VICENTE NORTE'],
            ['15', 'SAN VICENTE SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept10->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN VICENTE NORTE
        $muni1014 = $dept10->catalogs()->create([
            'key' => 'CAT-013-1001',
            'name' => 'SAN VICENTE NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN VICENTE NORTE
        $distritos = [
            ['01', 'Apastepeque'],
            ['04', 'San Esteban Catarina'],
            ['05', 'San Ildefonso'],
            ['06', 'San Lorenzo'],
            ['09', 'Santa Clara'],
            ['10', 'Santo Domingo'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1014->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN VICENTE SUR
        $muni1015 = $dept10->catalogs()->create([
            'key' => 'CAT-013-1002',
            'name' => 'SAN VICENTE SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN VICENTE SUR
        $distritos = [
            ['02', 'Guadalupe'],
            ['03', 'San Cayetano Istepeque'],
            ['08', 'San Vicente'],
            ['11', 'Tecoluca'],
            ['13', 'Verapaz'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1015->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: USULUTAN
        $dept11 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-11',
            'name' => 'USULUTAN',
            'description' => 'Departamento',
        ]);

        // Municipios como items de USULUTAN
        $municipiosItems = [
            ['24', 'USULUTÁN NORTE'],
            ['25', 'USULUTÁN ESTE'],
            ['26', 'USULUTÁN OESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept11->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: USULUTÁN NORTE
        $muni1124 = $dept11->catalogs()->create([
            'key' => 'CAT-013-1102',
            'name' => 'USULUTÁN NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de USULUTÁN NORTE
        $distritos = [
            ['05', 'El Triunfo'],
            ['07', 'Estanzuelas'],
            ['09', 'Jucuapa'],
            ['11', 'Mercedes Umaña'],
            ['12', 'Nueva Granada'],
            ['16', 'San Buenaventura'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1124->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: USULUTÁN ESTE
        $muni1125 = $dept11->catalogs()->create([
            'key' => 'CAT-013-1101',
            'name' => 'USULUTÁN ESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de USULUTÁN ESTE
        $distritos = [
            ['03', 'California'],
            ['06', 'Ereguayquín'],
            ['17', 'San Dionisio'],
            ['19', 'Santa Elena'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1125->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: USULUTÁN OESTE
        $muni1126 = $dept11->catalogs()->create([
            'key' => 'CAT-013-1103',
            'name' => 'USULUTÁN OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de USULUTÁN OESTE
        $distritos = [
            ['08', 'Jiquilisco'],
            ['18', 'San Francisco Javier'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1126->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: SAN MIGUEL
        $dept12 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-12',
            'name' => 'SAN MIGUEL',
            'description' => 'Departamento',
        ]);

        // Municipios como items de SAN MIGUEL
        $municipiosItems = [
            ['21', 'SAN MIGUEL NORTE'],
            ['22', 'SAN MIGUEL CENTRO'],
            ['23', 'SAN MIGUEL OESTE'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept12->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN MIGUEL NORTE
        $muni1221 = $dept12->catalogs()->create([
            'key' => 'CAT-013-1202',
            'name' => 'SAN MIGUEL NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN MIGUEL NORTE
        $distritos = [
            ['01', 'Carolina'],
            ['05', 'Ciudad Barrios'],
            ['02', 'Chapeltique'],
            ['14', 'San Gerardo'],
            ['19', 'Sesori'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1221->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN MIGUEL CENTRO
        $muni1222 = $dept12->catalogs()->create([
            'key' => 'CAT-013-1201',
            'name' => 'SAN MIGUEL CENTRO',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN MIGUEL CENTRO
        $distritos = [
            ['09', 'Moncagua'],
            ['04', 'Chirilagua'],
            ['12', 'Quelepa'],
            ['17', 'San Miguel'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1222->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: SAN MIGUEL OESTE
        $muni1223 = $dept12->catalogs()->create([
            'key' => 'CAT-013-1203',
            'name' => 'SAN MIGUEL OESTE',
            'description' => 'Municipio',
        ]);

        // Distritos de SAN MIGUEL OESTE
        $distritos = [
            ['03', 'Chinameca'],
            ['08', 'Lolotique'],
            ['10', 'Nueva Guadalupe'],
            ['15', 'San Jorge'],
            ['18', 'San Rafael Oriente'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1223->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: MORAZAN
        $dept13 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-13',
            'name' => 'MORAZAN',
            'description' => 'Departamento',
        ]);

        // Municipios como items de MORAZAN
        $municipiosItems = [
            ['27', 'MORAZÁN NORTE'],
            ['28', 'MORAZÁN SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept13->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: MORAZÁN NORTE
        $muni1327 = $dept13->catalogs()->create([
            'key' => 'CAT-013-1301',
            'name' => 'MORAZÁN NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de MORAZÁN NORTE
        $distritos = [
            ['01', 'Arambala'],
            ['02', 'Cacaopera'],
            ['04', 'Corinto'],
            ['07', 'El Rosario'],
            ['10', 'Joateca'],
            ['14', 'Meanguera'],
            ['18', 'San Fernando'],
            ['20', 'San Isidro'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1327->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: MORAZÁN SUR
        $muni1328 = $dept13->catalogs()->create([
            'key' => 'CAT-013-1302',
            'name' => 'MORAZÁN SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de MORAZÁN SUR
        $distritos = [
            ['03', 'Chilanga'],
            ['06', 'El Divisadero'],
            ['09', 'Guatajiagua'],
            ['12', 'Jocoro'],
            ['13', 'Lolotiquillo'],
            ['15', 'Osicala'],
            ['17', 'San Carlos'],
            ['19', 'San Francisco Gotera'],
            ['22', 'Sensembra'],
            ['23', 'Sociedad'],
            ['25', 'Yamabal'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1328->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Departamento: LA UNION
        $dept14 = $departamentosCatalog->catalogs()->create([
            'key' => 'CAT-012-14',
            'name' => 'LA UNION',
            'description' => 'Departamento',
        ]);

        // Municipios como items de LA UNION
        $municipiosItems = [
            ['19', 'LA UNIÓN NORTE'],
            ['20', 'LA UNIÓN SUR'],
        ];

        foreach ($municipiosItems as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $dept14->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA UNIÓN NORTE
        $muni1419 = $dept14->catalogs()->create([
            'key' => 'CAT-013-1401',
            'name' => 'LA UNIÓN NORTE',
            'description' => 'Municipio',
        ]);

        // Distritos de LA UNIÓN NORTE
        $distritos = [
            ['06', 'El Sauce'],
            ['09', 'Lislique'],
            ['11', 'Nueva Esparta'],
            ['12', 'Pasaquina'],
            ['13', 'Polorós'],
            ['16', 'Santa Rosa de Lima'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1419->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

        // Municipio: LA UNIÓN SUR
        $muni1420 = $dept14->catalogs()->create([
            'key' => 'CAT-013-1402',
            'name' => 'LA UNIÓN SUR',
            'description' => 'Municipio',
        ]);

        // Distritos de LA UNIÓN SUR
        $distritos = [
            ['04', 'Conchagua'],
            ['05', 'El Carmen'],
            ['10', 'Meanguera del Golfo'],
            ['14', 'San Alejo'],
            ['17', 'Yayantique'],
            ['18', 'Yucuaiquín'],
        ];

        foreach ($distritos as [$key, $name]) {
            CatalogItem::create([
                'catalog_id' => $muni1420->id,
                'key' => $key,
                'name' => $name,
            ]);
        }

    }
}
