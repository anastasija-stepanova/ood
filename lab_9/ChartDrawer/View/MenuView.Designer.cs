namespace lab9.View.MainMenu
{
    partial class MainMenuView
    {
        /// <summary>
        /// Обязательная переменная конструктора.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Освободить все используемые ресурсы.
        /// </summary>
        /// <param name="disposing">истинно, если управляемый ресурс должен быть удален; иначе ложно.</param>
        protected override void Dispose( bool disposing )
        {
            if ( disposing && ( components != null ) )
            {
                components.Dispose();
            }
            base.Dispose( disposing );
        }

        #region Код, автоматически созданный конструктором форм Windows

        /// <summary>
        /// Требуемый метод для поддержки конструктора — не изменяйте 
        /// содержимое этого метода с помощью редактора кода.
        /// </summary>
        private void InitializeComponent()
        {
            this.components = new System.ComponentModel.Container();
            System.Windows.Forms.DataGridViewCellStyle dataGridViewCellStyle1 = new System.Windows.Forms.DataGridViewCellStyle();
            this.HarmonicProperties = new System.Windows.Forms.GroupBox();
            this.label2 = new System.Windows.Forms.Label();
            this.textBox2 = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.textBox3 = new System.Windows.Forms.TextBox();
            this.radioButton2 = new System.Windows.Forms.RadioButton();
            this.radioButton1 = new System.Windows.Forms.RadioButton();
            this.label1 = new System.Windows.Forms.Label();
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.button1 = new System.Windows.Forms.Button();
            this.button2 = new System.Windows.Forms.Button();
            this.Harmonics = new System.Windows.Forms.GroupBox();
            this.harmonicList = new System.Windows.Forms.ListBox();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.chartTableView = new System.Windows.Forms.DataGridView();
            this.errorProvider1 = new System.Windows.Forms.ErrorProvider(this.components);
            this.errorProvider2 = new System.Windows.Forms.ErrorProvider(this.components);
            this.errorProvider3 = new System.Windows.Forms.ErrorProvider(this.components);
            this.HarmonicProperties.SuspendLayout();
            this.Harmonics.SuspendLayout();
            this.tabControl1.SuspendLayout();
            this.tabPage2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.chartTableView)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider3)).BeginInit();
            this.SuspendLayout();
            // 
            // HarmonicProperties
            // 
            this.HarmonicProperties.Anchor = ((System.Windows.Forms.AnchorStyles)((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Right)));
            this.HarmonicProperties.AutoSize = true;
            this.HarmonicProperties.Controls.Add(this.label2);
            this.HarmonicProperties.Controls.Add(this.textBox2);
            this.HarmonicProperties.Controls.Add(this.label3);
            this.HarmonicProperties.Controls.Add(this.textBox3);
            this.HarmonicProperties.Controls.Add(this.radioButton2);
            this.HarmonicProperties.Controls.Add(this.radioButton1);
            this.HarmonicProperties.Controls.Add(this.label1);
            this.HarmonicProperties.Controls.Add(this.textBox1);
            this.HarmonicProperties.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.HarmonicProperties.ForeColor = System.Drawing.SystemColors.ActiveCaptionText;
            this.HarmonicProperties.Location = new System.Drawing.Point(332, 12);
            this.HarmonicProperties.Margin = new System.Windows.Forms.Padding(0);
            this.HarmonicProperties.Name = "HarmonicProperties";
            this.HarmonicProperties.Padding = new System.Windows.Forms.Padding(0);
            this.HarmonicProperties.Size = new System.Drawing.Size(291, 232);
            this.HarmonicProperties.TabIndex = 0;
            this.HarmonicProperties.TabStop = false;
            // 
            // phaseLabel
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(17, 167);
            this.label2.Name = "phaseLabel";
            this.label2.Size = new System.Drawing.Size(48, 17);
            this.label2.TabIndex = 7;
            this.label2.Text = "Phase";
            // 
            // phaseTextBox
            // 
            this.textBox2.Location = new System.Drawing.Point(150, 170);
            this.textBox2.MaxLength = 10;
            this.textBox2.Name = "phaseTextBox";
            this.textBox2.Size = new System.Drawing.Size(100, 22);
            this.textBox2.TabIndex = 6;
            // 
            // frequencyLabel
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(17, 127);
            this.label3.Name = "frequencyLabel";
            this.label3.Size = new System.Drawing.Size(75, 17);
            this.label3.TabIndex = 5;
            this.label3.Text = "Frequency";
            // 
            // frequencyTextBox
            // 
            this.textBox3.Location = new System.Drawing.Point(150, 130);
            this.textBox3.MaxLength = 12;
            this.textBox3.Name = "frequencyTextBox";
            this.textBox3.Size = new System.Drawing.Size(100, 22);
            this.textBox3.TabIndex = 4;
            // 
            // cosRadioButton
            // 
            this.radioButton2.AutoSize = true;
            this.radioButton2.Location = new System.Drawing.Point(147, 87);
            this.radioButton2.Name = "cosRadioButton";
            this.radioButton2.Size = new System.Drawing.Size(53, 21);
            this.radioButton2.TabIndex = 3;
            this.radioButton2.Text = "Cos";
            this.radioButton2.UseVisualStyleBackColor = true;
            // 
            // sinRadioButton
            // 
            this.radioButton1.AutoSize = true;
            this.radioButton1.Location = new System.Drawing.Point(17, 87);
            this.radioButton1.Name = "sinRadioButton";
            this.radioButton1.Size = new System.Drawing.Size(49, 21);
            this.radioButton1.TabIndex = 2;
            this.radioButton1.Text = "Sin";
            this.radioButton1.UseVisualStyleBackColor = true;
            // 
            // amplitudeLabel
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(17, 47);
            this.label1.Name = "amplitudeLabel";
            this.label1.Size = new System.Drawing.Size(70, 17);
            this.label1.TabIndex = 1;
            this.label1.Text = "Amplitude";
            // 
            // amplitudeTextBox
            // 
            this.textBox1.Location = new System.Drawing.Point(150, 50);
            this.textBox1.MaxLength = 10;
            this.textBox1.Name = "amplitudeTextBox";
            this.textBox1.Size = new System.Drawing.Size(100, 22);
            this.textBox1.TabIndex = 0;
            this.textBox1.TextChanged += new System.EventHandler(this.amplitudeTextBox_TextChanged);
            // 
            // AddNewHarmonicButton
            // 
            this.button1.AutoSize = true;
            this.button1.Location = new System.Drawing.Point(12, 217);
            this.button1.Name = "AddNewHarmonicButton";
            this.button1.Size = new System.Drawing.Size(75, 27);
            this.button1.TabIndex = 2;
            this.button1.Text = "Add new";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.AddNewHarmonicButton_Click);
            // 
            // deleteHarmonicButton
            // 
            this.button2.AutoSize = true;
            this.button2.Location = new System.Drawing.Point(137, 217);
            this.button2.Name = "deleteHarmonicButton";
            this.button2.Size = new System.Drawing.Size(118, 27);
            this.button2.TabIndex = 3;
            this.button2.Text = "Delete Selected";
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.DeleteHarmonicButton_Click);
            // 
            // Harmonics
            // 
            this.Harmonics.AutoSize = true;
            this.Harmonics.Controls.Add(this.harmonicList);
            this.Harmonics.Location = new System.Drawing.Point(12, 12);
            this.Harmonics.Name = "Harmonics";
            this.Harmonics.Size = new System.Drawing.Size(265, 200);
            this.Harmonics.TabIndex = 4;
            this.Harmonics.TabStop = false;
            this.Harmonics.Text = "Harmonics";
            // 
            // harmonicList
            // 
            this.harmonicList.FormattingEnabled = true;
            this.harmonicList.ItemHeight = 16;
            this.harmonicList.Location = new System.Drawing.Point(6, 47);
            this.harmonicList.Name = "harmonicList";
            this.harmonicList.Size = new System.Drawing.Size(231, 132);
            this.harmonicList.TabIndex = 0;
            this.harmonicList.Click += new System.EventHandler(this.HarmonicList_SelectedIndexClicked);
            this.harmonicList.SelectedIndexChanged += new System.EventHandler(this.HarmonicList_SelectedIndexChanged);
            // 
            // tabControl1
            // 
            this.tabControl1.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Location = new System.Drawing.Point(12, 275);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(611, 370);
            this.tabControl1.TabIndex = 5;
            // 
            // tabPage1
            // 
            this.tabPage1.Location = new System.Drawing.Point(4, 25);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(603, 341);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Chart";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.chartTableView);
            this.tabPage2.Location = new System.Drawing.Point(4, 25);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(603, 341);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Table";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // chartTableView
            // 
            this.chartTableView.Anchor = ((System.Windows.Forms.AnchorStyles)((((System.Windows.Forms.AnchorStyles.Top | System.Windows.Forms.AnchorStyles.Bottom) 
            | System.Windows.Forms.AnchorStyles.Left) 
            | System.Windows.Forms.AnchorStyles.Right)));
            this.chartTableView.AutoSizeColumnsMode = System.Windows.Forms.DataGridViewAutoSizeColumnsMode.Fill;
            this.chartTableView.AutoSizeRowsMode = System.Windows.Forms.DataGridViewAutoSizeRowsMode.AllCells;
            this.chartTableView.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            dataGridViewCellStyle1.Alignment = System.Windows.Forms.DataGridViewContentAlignment.MiddleLeft;
            dataGridViewCellStyle1.BackColor = System.Drawing.SystemColors.Window;
            dataGridViewCellStyle1.Font = new System.Drawing.Font("Microsoft Sans Serif", 7.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            dataGridViewCellStyle1.ForeColor = System.Drawing.SystemColors.ControlText;
            dataGridViewCellStyle1.SelectionBackColor = System.Drawing.SystemColors.Highlight;
            dataGridViewCellStyle1.SelectionForeColor = System.Drawing.SystemColors.HighlightText;
            dataGridViewCellStyle1.WrapMode = System.Windows.Forms.DataGridViewTriState.True;
            this.chartTableView.DefaultCellStyle = dataGridViewCellStyle1;
            this.chartTableView.Location = new System.Drawing.Point(6, 6);
            this.chartTableView.Name = "chartTableView";
            this.chartTableView.ReadOnly = true;
            this.chartTableView.RowTemplate.Height = 24;
            this.chartTableView.Size = new System.Drawing.Size(591, 329);
            this.chartTableView.TabIndex = 0;
            // 
            // amplitudeErrorProvider
            // 
            this.errorProvider1.ContainerControl = this;
            // 
            // frequencyErrorProvider
            // 
            this.errorProvider2.ContainerControl = this;
            // 
            // phaseErrorProvider
            // 
            this.errorProvider3.ContainerControl = this;
            // 
            // MainMenuView
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(635, 657);
            this.Controls.Add(this.tabControl1);
            this.Controls.Add(this.Harmonics);
            this.Controls.Add(this.button2);
            this.Controls.Add(this.button1);
            this.Controls.Add(this.HarmonicProperties);
            this.MaximumSize = new System.Drawing.Size(753, 804);
            this.MinimumSize = new System.Drawing.Size(653, 704);
            this.Name = "MainMenuView";
            this.Load += new System.EventHandler(this.MainMenu_Load);
            this.HarmonicProperties.ResumeLayout(false);
            this.HarmonicProperties.PerformLayout();
            this.Harmonics.ResumeLayout(false);
            this.tabControl1.ResumeLayout(false);
            this.tabPage2.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.chartTableView)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.errorProvider3)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.GroupBox HarmonicProperties;
        private System.Windows.Forms.RadioButton radioButton1;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox textBox2;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.TextBox textBox3;
        private System.Windows.Forms.RadioButton radioButton2;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.GroupBox Harmonics;
        private System.Windows.Forms.ListBox harmonicList;
        private System.Windows.Forms.TabControl tabControl1;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.ErrorProvider errorProvider1;
        private System.Windows.Forms.ErrorProvider errorProvider2;
        private System.Windows.Forms.ErrorProvider errorProvider3;
        private System.Windows.Forms.DataGridView chartTableView;
    }
}

