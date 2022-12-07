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

class Nums
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
    
    public function makeTree(int $nums): array
    {
        $tree = [];
        
        for ($i = 1; $i <= $nums; $i++) {
            if($i == 1) {
                $tree = [1];
                $trees[] = $tree;
                continue;
            }
            
            $tree2 = [];
            foreach($tree as $index => $line) {
                if(isset($tree2[$index])) { 
                    $tree2[$index] += $line;
                } else {
                    $tree2[$index] = $line;    
                }
                
                if(isset($tree2[$index+1])) { 
                    $tree2[$index] += $line;
                } else {
                    $tree2[$index+1] = $line;    
                }
            }
            $tree = $tree2;
            $trees[] = $tree2;
        }
        
        return $trees;
    }
    
    public function check()
    {
        foreach($this->cases as $case) {
            $tree = $this->makeTree($case['level']);
            
            if($tree === $case['expect']) {
                echo 'Tree correct!' . "\n";    
            }
            var_dump($tree) . "\n\n";
        }    
    }
}
$tree = new Nums();
$tree->check();
