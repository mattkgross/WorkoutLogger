﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace Workout.App_UserControls
{
    public partial class ucLogin : System.Web.UI.UserControl
    {
        #region Properties
        public double Width
        {
            get
            {
                return pnlContainer.Width.Value;
            }
            set
            {
                pnlContainer.Width = new Unit(value);
            }
        }

        public double WidthPercentage
        {
            get
            {
                return this.Width / ucDimensions.Width;
            }

            set
            {
                this.Width = ucDimensions.Width * (value / 100);
            }
        }

        #endregion Properties

        #region Page Events

        protected void Page_Load(object sender, EventArgs e)
        {
        }

        #endregion Page Events
    }
}