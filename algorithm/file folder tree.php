<?php

$folders = [
    ['id' => 1, 'name' => 'Folder 1', 'parent_id' => null, 'file_count' => 0, 'child_count' => 0],
    ['id' => 2, 'name' => 'Folder 2', 'parent_id' => 1, 'file_count' => 0, 'child_count' => 0],
    ['id' => 3, 'name' => 'Folder 3', 'parent_id' => null, 'file_count' => 0, 'child_count' => 0],
    ['id' => 4, 'name' => 'Folder 4', 'parent_id' => 2, 'file_count' => 0, 'child_count' => 0],
    ['id' => 5, 'name' => 'Folder 5', 'parent_id' => null, 'file_count' => 0, 'child_count' => 0],
    ['id' => 6, 'name' => 'Folder 5', 'parent_id' => 2, 'file_count' => 0, 'child_count' => 0],
    ['id' => 7, 'name' => 'Folder 5', 'parent_id' => 2, 'file_count' => 0, 'child_count' => 0],
];
$files = [
    ['id' => 1, 'name' => 'File 1', 'folder_id' => 2],
    ['id' => 2, 'name' => 'File 2', 'folder_id' => 1],
    ['id' => 3, 'name' => 'File 3', 'folder_id' => 3],
    ['id' => 4, 'name' => 'File 4', 'folder_id' => 4],
    ['id' => 5, 'name' => 'File 5', 'folder_id' => 2],
];

$nestedFolders = [];
foreach ($folders as $folder) {
    $nestedFolders[$folder['id']] = $folder;
    $nestedFolders[$folder['id']]['children'] = [];
}

foreach ($folders as $folder) {
    if ($folder['parent_id'] !== null) {
        $nestedFolders[$folder['parent_id']]['children'][] = &$nestedFolders[$folder['id']];
        $nestedFolders[$folder['parent_id']]['child_count'] += 1;
    }
}

foreach ($files as $file) {
    if ($file['folder_id'] !== null) {
        $nestedFolders[$file['folder_id']]['file_count'] += 1;
    }
}


print_r($nestedFolders);
