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

	public $subject = [
		'subjects' => 'required|string',
		'subject_hours' => 'integer',
	];

	public $subject_errors = [
		'subjects'=>[
			'required' => 'products wajib diisi',
			'string' => 'products hanya dapat diisi string',
		],
		'subject_hours'=>[
			'integer' => 'kapasitas wajib diisi angka',
		],
	];

	public $student = [
		'name' => 'required|string',
		'tgl_lahir' => 'date',
		'tmpt_lahir' => 'required',
		'gender' => 'required',
	];

	public $student_errors = [
		'name'=>[
			'required' => 'products wajib diisi',
			'string' => 'products hanya dapat diisi string',
		],
		'tgl_lahir'=>[
			'date' => 'kapasitas wajib diisi angka',
		],
	];
}
