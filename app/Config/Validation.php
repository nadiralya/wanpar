<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $products = [
        'nama'   => [
            'rules' => 'required|min_length[2]',
        ],
        'harga'   => [
            'rules' => 'required|is_natural',
        ],
        'stok'   => [
            'rules' => 'required|is_natural',
        ],
    ];
    public $products_errors = [
        'nama' =>[
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimum 2 karakter',
        ],
        'harga' =>[
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak boleh negatif',
        ],
        'stok' =>[
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak boleh negatif',
        ],

    ];
	public $transaksi = [
        'nama'   => [
            'rules' => 'required|min_length[2]',
        ],
        'harga'   => [
            'rules' => 'required|is_natural',
        ],
        'stok'   => [
            'rules' => 'required|is_natural',
        ],
    ];
    public $transaksi_errors = [
        'nama' =>[
            'required' => '{field} Harus diisi',
            'min_length' => '{field} Minimum 2 karakter',
        ],
        'harga' =>[
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak boleh negatif',
        ],
        'stok' =>[
            'required' => '{field} Harus diisi',
            'is_natural' => '{field} Tidak boleh negatif',
        ],
    ];

}
