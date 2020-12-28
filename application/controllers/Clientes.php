<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class Clientes extends MY_Controller
{

    /**
     * author: Ramon Silva
     * email: silva018-mg@yahoo.com.br
     *
     */

    public function __construct()
    {
        parent::__construct();

        $this->load->model('clientes_model');
        $this->data['menuClientes'] = 'clientes';
    }

    public function index()
    {
        $this->gerenciar();
    }

    public function gerenciar()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }
        $this->load->library('pagination');

        $this->data['configuration']['base_url'] = site_url('clientes/gerenciar/');
        $this->data['configuration']['total_rows'] = $this->clientes_model->count('clientes');

        $this->pagination->initialize($this->data['configuration']);

        $this->data['results'] = $this->clientes_model->get('clientes', '*', '', $this->data['configuration']['per_page'], $this->uri->segment(3));

        $this->data['view'] = 'clientes/clientes';
        return $this->layout();
    }

    public function adicionar()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar clientes.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => set_value('nomeCliente'),
                'documento' => set_value('documento'),
                'telefone' => set_value('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => set_value('email'),
                'rua' => set_value('rua'),
                'numero' => set_value('numero'),
                'bairro' => set_value('bairro'),
                'cidade' => set_value('cidade'),
                'estado' => set_value('estado'),
                'cep' => set_value('cep'),
				'foto_url' => set_value('foto_url'),
				'senha' => set_value('senha'),
                'dataCadastro' => date('Y-m-d'),
            );

            if ($this->clientes_model->add('clientes', $data) == true) {
                $this->session->set_flashdata('success', 'Cliente adicionado com sucesso!');
                log_info('Adicionou um cliente.');
                redirect(site_url('clientes/adicionar/'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->data['view'] = 'clientes/adicionarCliente';
        return $this->layout();
    }

    public function editar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar clientes.');
            redirect(base_url());
        }

        $this->load->library('form_validation');
        $this->data['custom_error'] = '';

        if ($this->form_validation->run('clientes') == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {
            $data = array(
                'nomeCliente' => $this->input->post('nomeCliente'),
                'documento' => $this->input->post('documento'),
                'telefone' => $this->input->post('telefone'),
                'celular' => $this->input->post('celular'),
                'email' => $this->input->post('email'),
                'rua' => $this->input->post('rua'),
                'numero' => $this->input->post('numero'),
                'bairro' => $this->input->post('bairro'),
                'cidade' => $this->input->post('cidade'),
                'estado' => $this->input->post('estado'),
                'cep' => $this->input->post('cep'),
				'foto_url' => $this->input->post('foto_url'),
				'senha' => $this->input->post('senha'),
				
            );

            if ($this->clientes_model->edit('clientes', $data, 'idClientes', $this->input->post('idClientes')) == true) {
                $this->session->set_flashdata('success', 'Cliente editado com sucesso!');
                log_info('Alterou um cliente. ID' . $this->input->post('idClientes'));
                redirect(site_url('clientes/editar/') . $this->input->post('idClientes'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro</p></div>';
            }
        }
		
		$this->data['foto_clientes'] = $this->clientes_model->getFotos($this->uri->segment(3));
        $this->data['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['view'] = 'clientes/editarCliente';
        return $this->layout();
    }

    public function visualizar()
    {

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('mapos');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar clientes.');
            redirect(base_url());
        }

        $this->data['custom_error'] = '';
        $this->data['result'] = $this->clientes_model->getById($this->uri->segment(3));
        $this->data['results'] = $this->clientes_model->getOsByCliente($this->uri->segment(3));
        $this->data['view'] = 'clientes/visualizar';
        return $this->layout();
    }

    public function excluir()
    {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir clientes.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar excluir cliente.');
            redirect(site_url('clientes/gerenciar/'));
        }

        $os = $this->clientes_model->getAllOsByClient($id);
        if ($os != null) {

            $this->clientes_model->removeClientOs($os);
        }

        // excluindo Vendas vinculadas ao cliente
        $vendas = $this->clientes_model->getAllVendasByClient($id);
        if ($vendas != null) {
            $this->clientes_model->removeClientVendas($vendas);
        }
		
		$this->clientes_model->delete('foto_clientes', 'cliente_id', $id);
        $this->clientes_model->delete('clientes', 'idClientes', $id);
        log_info('Removeu um cliente. ID' . $id);

        $this->session->set_flashdata('success', 'Cliente excluido com sucesso!');
        redirect(site_url('clientes/gerenciar/'));
    }
	public function anexar()
    {
        $this->load->library('upload');
        $this->load->library('image_lib');

        $directory = FCPATH . 'assets/anexos/Clientes/ID-' . $this->input->post('idFotoCliente');

        // If it exist, check if it's a directory
        if (!is_dir($directory . '/thumbs')) {
            // make directory for images and thumbs
            try {
                mkdir($directory . '/thumbs', 0755, true);  
            }
            catch(Exception $e){
                echo json_encode(array('result' => false, 'mensagem' => $e->getMessage()));
                die();
            }

        } 

        $upload_conf = array(
            'upload_path' => $directory,
            'allowed_types' => 'jpg|png|gif|jpeg|JPG|PNG|GIF|JPEG', // formatos permitidos para foto de cliente
            'max_size' => 0,
            'remove_space' => true,
            'encrypt_name' => true,
        );

        $this->upload->initialize($upload_conf);

        foreach ($_FILES['userfile'] as $key => $val) {
            $i = 1;
            foreach ($val as $v) {
                $field_name = "file_" . $i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        unset($_FILES['userfile']);

        $error = array();
        $success = array();

        foreach ($_FILES as $field_name => $file) {
            if (!$this->upload->do_upload($field_name)) {
                $error['upload'][] = $this->upload->display_errors();
            } else {

                $upload_data = $this->upload->data();

                if ($upload_data['is_image'] == 1) {

                    // set the resize config
                    $resize_conf = array(

                        'source_image' => $upload_data['full_path'],
                        'new_image' => $upload_data['file_path'] . 'thumbs/thumb_' . $upload_data['file_name'],
                        'width' => 200,
                        'height' => 140,
                    );

                    $this->image_lib->initialize($resize_conf);

                    if (!$this->image_lib->resize()) {
                        $error['resize'][] = $this->image_lib->display_errors();
                    } else {
                        $success[] = $upload_data;
                        $this->load->model('Clientes_model');
                        $this->Clientes_model->anexar($this->input->post('idFotoCliente'), $upload_data['file_name'], base_url('assets/anexos/Clientes/ID-' . $this->input->post('idFotoCliente')), 'thumb_' . $upload_data['file_name'], $directory);
                    }
                } else {

                    $success[] = $upload_data;

                    $this->load->model('Clientes_model');

                    $this->Clientes_model->anexar($this->input->post('idFotoCliente'), $upload_data['file_name'], base_url('assets/anexos/Clientes/ID-' . $this->input->post('idFotoCliente')), '', $directory);
                }
            }
        }

        if (count($error) > 0) {
            echo json_encode(array('result' => false, 'mensagem' => 'Nenhuma foto foi anexada.'));
        } else {

            log_info('Adicionou Foto(s) no cliente: ID ' . $this->input->post('idFotoCliente'));
            echo json_encode(array('result' => true, 'mensagem' => 'Foto adicionada com sucesso.'));
        }
    }

//    public function excluirAnexo($id = null)
//  {
//    if ($id == null || !is_numeric($id)) {
//      echo json_encode(array('result' => true, 'mensagem' => 'Erro ao tentar excluir foto.'));
//        } else {
//
//            $this->db->where('idFotos', $id);
//            $file = $this->db->get('foto_clientes', 1)->row();
//			$idClientes = $this->input->post('idClientes');
//
//            unlink($file->path . '/' . $file->anexo);
//
 //           if ($file->thumb != null) {
//                unlink($file->path . '/thumbs/' . $file->thumb);
//            }
//
//            log_info('Removeu uma Foto no cliente: ID ' . $idClientes);
//                echo json_encode(array('result' => true, 'mensagem' => 'Foto excluída com sucesso.'));
//			 }
//		}
		
		public function excluirAnexo()
    {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'dCliente')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para excluir arquivos.');
            redirect(base_url());
        }

        $id = $this->input->post('id');
        if ($id == null || !is_numeric($id)) {
            $this->session->set_flashdata('error', 'Erro! O arquivo não pode ser localizado.');
            redirect(site_url('arquivos'));
        }

        $file = $this->arquivos_model->getById($id);
        $this->db->where('idDocumentos', $id);
        if ($this->db->delete('documentos')) {

            $path = $file->path;
            unlink($path);
            $this->session->set_flashdata('success', 'Arquivo excluido com sucesso!');
            log_info('Removeu um arquivo. ID: ' . $id);

        } else {
            $this->session->set_flashdata('error', 'Ocorreu um erro ao tentar excluir o arquivo.');
        }
    }
}
//. $this->input->post('idClientes')