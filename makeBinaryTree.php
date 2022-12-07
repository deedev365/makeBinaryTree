<?php
/*
           1
          1 1     {0,1}{1,2} => 1 2 1  
         1 2 1  1{0,1} 2{1,2} 1{2,3} => 1 3 3 1  
        1 3 3 1 
       1 4 6 4 1
        
       Input: 1
       Output: [[1]]
        
       Input: 2
       Output: [[1],[1,1]]
       
       Input: 3
       Output: [[1],[1,1],[1,2,1]]
        
       Input: 4
       Output: [[1],[1,1],[1,2,1],[1,3,3,1]]
*/

class Tree
{
    public $cases = [
            [
            'level' => 1,
            'expect' => [[1]]
            ],
            [
            'level' => 2,
            'expect' => [[1],[1,1]]
            ],
            [
            'level' => 3,
            'expect' => [[1],[1,1],[1,2,1]]
            ],
            [
            'level' => 4,
            'expect' => [[1],[1,1],[1,2,1],[1,3,3,1]]
            ],
    ];
    
    public function makeTree(int $treelevel): array
    {
        $tree = [];
        
        for ($i = 1; $i <= $treelevel; $i++) {
            if($i == 1) {
                $tree = [1];
                $bigTree[] = $tree;
                continue;
            }
            
            $treeNew = [];
            foreach($tree as $index => $line) {
                if(isset($treeNew[$index])) { 
                    $treeNew[$index] += $line;
                } else {
                    $treeNew[$index] = $line;    
                }
                
                if(isset($treeNew[$index+1])) { 
                    $treeNew[$index] += $line;
                } else {
                    $treeNew[$index+1] = $line;    
                }
            }
            $tree = $treeNew;
            $bigTree[] = $treeNew;
        }
        
        return $bigTree;
    }
    
    public function check(bool $printTree = true): void
    {
        foreach($this->cases as $case) {
            $tree = $this->makeTree($case['level']);
            echo 'Tree level ' . $case['level'];
            
            echo ($tree === $case['expect']) ? ' (correct)' : ' (wrong)' ;
            echo "\n";
            
            if($printTree) {
                var_dump($tree) . "\n\n";
            }
                
        }    
    }
}
$tree = new Tree();
$tree->check();
