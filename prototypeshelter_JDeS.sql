--
-- Table structure `prototypeshelter_JDeS`
--

CREATE TABLE `prototypeshelter_JDeS` (
  `id` int(11) NOT NULL,
  `prototype` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `version` int(2) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `fileName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `prototypeshelter_JDeS`
--
ALTER TABLE `prototypeshelter_JDeS`
  ADD PRIMARY KEY (`id`) KEY_BLOCK_SIZE=11 USING BTREE;

--
-- AUTO_INCREMENT for table `prototypeshelter_JDeS`
--
ALTER TABLE `prototypeshelter_JDeS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;
