var ServiceVM = function(model)
{
	var self = this;
	
	self.Name = ko.observable(model.ServiceName);
	self.Status = ko.observable(model.ServiceStatus)
	self.Desc = ko.observable(model.ServiceDesc);
	
    self.IsActive = ko.observable(model.IsActive);
    self.IsRunning = ko.observable(model.IsRunning);
    self.IsLoaded = ko.observable(model.IsLoaded);
	
	
	self.Waiting = ko.observable(false);
	
	self.Timer = null;
	
	
	self.Refresh = function()
	{
		self.Waiting(true);		
		self.UpdateInfos();
	}
	
	self.EndRefresh = function()
	{
		self.Waiting(false);
		
		if(self.Timer != null)
		{
			clearTimeout(self.Timer);
		}
		
		self.Timer = setTimeout(self.Refresh, 50000);		
	}
	
	
	self.RunService = function()
	{
		if(!self.IsRunning())
		{
			$.ajax({
			    method: 'GET',
			    dataType: "json",
			    url: "/service/" + self.Name() + "/on",
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
				function (allData) {
					self.SetData(allData.Item);
					self.IsRunning(true);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
		}		
	}
	
	self.StopService = function()
	{
		if(self.IsRunning())
		{
			$.ajax({
			    method: 'GET',
			    dataType: "json",
			    url: "/service/" + self.Name() + "/off",
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
				function (allData) {
					self.SetData(allData.Item);
					self.IsRunning(false);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
		}		
	}
	
	self.ToggleService = function()
	{
		if(self.IsRunning())
			self.StopService();
		else
			self.RunService();		
	}
	
	self.UpdateInfos = function()
	{			
		$.ajax({
			    method: 'GET',
			    dataType: "json",
			    url: "/service/" + self.Name(),
			    contentType: "application/json",
			    beforeSend: function () {
			    },
			    complete: function () {
				    self.EndRefresh();
			    },
			    success:
				function (allData) {
					self.SetData(allData.Item);
				},
			    error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("Erreur");
				//self.actionEnCoursDocuments(false);
			    }
			});
	}
	
	self.SetData = function(data)
	{
		if(data != null)
		{
			self.Name(data.ServiceName);
			self.Status(data.ServiceStatus)
			self.Desc(data.ServiceDesc);
			
			self.IsActive(data.IsActive);
			self.IsRunning(data.IsRunning);
			self.IsLoaded(data.IsLoaded);
		}
	}
	
	
	self.EndRefresh();
}
