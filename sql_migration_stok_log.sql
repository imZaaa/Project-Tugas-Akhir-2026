-- =============================================
-- MIGRASI: Tabel Log Perubahan Stok (Audit Trail)
-- Jalankan SQL ini di phpMyAdmin atau MySQL CLI
-- =============================================

CREATE TABLE IF NOT EXISTS `stok_log` (
    `id_log`        INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_product`    INT(11) NOT NULL COMMENT 'FK ke tabel products',
    `id_user`       INT(11) NOT NULL COMMENT 'FK ke tabel users (siapa yang mengubah)',
    `stok_sebelum`  INT(11) NOT NULL COMMENT 'Stok sebelum perubahan',
    `stok_sesudah`  INT(11) NOT NULL COMMENT 'Stok sesudah perubahan',
    `selisih`       INT(11) NOT NULL COMMENT 'Selisih perubahan (bisa negatif)',
    `keterangan`    VARCHAR(255) DEFAULT NULL COMMENT 'Alasan perubahan stok',
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_log`),
    KEY `idx_product` (`id_product`),
    KEY `idx_user` (`id_user`),
    KEY `idx_created` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Log audit perubahan stok manual (opname)';
