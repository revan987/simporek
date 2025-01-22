<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateTriggersForStokobats extends Migration
{
    public function up()
    {
        // Trigger for obatmasuks on INSERT
        DB::unprepared('
            CREATE TRIGGER trg_after_insert_obatmasuks
            AFTER INSERT ON obatmasuks
            FOR EACH ROW
            BEGIN
                REPLACE INTO stokobats (id_obat, nama_obat, jumlah_tersedia)
                SELECT 
                    NEW.id_obat,
                    NEW.nama_obat,
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = NEW.id_obat), 0) - 
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = NEW.id_obat), 0);
            END
        ');

        // Trigger for obatmasuks on UPDATE
        DB::unprepared('
            CREATE TRIGGER trg_after_update_obatmasuks
            AFTER UPDATE ON obatmasuks
            FOR EACH ROW
            BEGIN
                UPDATE stokobats
                SET jumlah_tersedia = 
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = NEW.id_obat), 0) -
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = NEW.id_obat), 0)
                WHERE id_obat = NEW.id_obat;
            END
        ');

        // Trigger for obatmasuks on DELETE
        DB::unprepared('
            CREATE TRIGGER trg_after_delete_obatmasuks
            AFTER DELETE ON obatmasuks
            FOR EACH ROW
            BEGIN
                UPDATE stokobats
                SET jumlah_tersedia = 
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = OLD.id_obat), 0) -
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = OLD.id_obat), 0)
                WHERE id_obat = OLD.id_obat;
            END
        ');

        // Trigger for obatkeluars on INSERT
        DB::unprepared('
            CREATE TRIGGER trg_after_insert_obatkeluars
            AFTER INSERT ON obatkeluars
            FOR EACH ROW
            BEGIN
                REPLACE INTO stokobats (id_obat, nama_obat, jumlah_tersedia)
                SELECT 
                    NEW.id_obat,
                    NEW.nama_obat,
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = NEW.id_obat), 0) - 
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = NEW.id_obat), 0);
            END
        ');

        // Trigger for obatkeluars on UPDATE
        DB::unprepared('
            CREATE TRIGGER trg_after_update_obatkeluars
            AFTER UPDATE ON obatkeluars
            FOR EACH ROW
            BEGIN
                UPDATE stokobats
                SET jumlah_tersedia = 
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = NEW.id_obat), 0) -
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = NEW.id_obat), 0)
                WHERE id_obat = NEW.id_obat;
            END
        ');

        // Trigger for obatkeluars on DELETE
        DB::unprepared('
            CREATE TRIGGER trg_after_delete_obatkeluars
            AFTER DELETE ON obatkeluars
            FOR EACH ROW
            BEGIN
                UPDATE stokobats
                SET jumlah_tersedia = 
                    IFNULL((SELECT SUM(jumlah_masuk) FROM obatmasuks WHERE id_obat = OLD.id_obat), 0) -
                    IFNULL((SELECT SUM(jumlah_keluar) FROM obatkeluars WHERE id_obat = OLD.id_obat), 0)
                WHERE id_obat = OLD.id_obat;
            END
        ');

        // Trigger for masterobats on UPDATE
        DB::unprepared('
            CREATE TRIGGER trg_after_update_masterobats
            AFTER UPDATE ON masterobats
            FOR EACH ROW
            BEGIN
                UPDATE obatmasuks
                SET nama_obat = NEW.nama_obat
                WHERE id_obat = OLD.id_obat;
                
                UPDATE obatkeluars
                SET nama_obat = NEW.nama_obat
                WHERE id_obat = OLD.id_obat;
                
                UPDATE stokobats
                SET nama_obat = NEW.nama_obat
                WHERE id_obat = OLD.id_obat;
            END
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_insert_obatmasuks');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_update_obatmasuks');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_delete_obatmasuks');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_insert_obatkeluars');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_update_obatkeluars');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_delete_obatkeluars');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_after_update_masterobats');
    }
}
