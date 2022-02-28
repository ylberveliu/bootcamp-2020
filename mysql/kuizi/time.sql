SET @ct = current_time();

-- Ora aktuale 15:30:25
SELECT current_time() 'Time';

-- • Ora (nga ora aktuale) 15
-- SELECT hour(@ct) 'Hour';

-- • Minutat (nga ora aktuale) 30
-- SELECT minute(@ct) 'Min';

-- • Sekondat (nga ora aktuale) 25
SELECT second(@ct) 'Sec';